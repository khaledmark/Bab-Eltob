<?php

namespace App\Traits;

use App\Translation;
use Illuminate\Support\Collection;

trait Translatable
{
    /**
     * @var TranslationCollection
     */
    protected $translationCollection = null;

    /**
     * Make sure to delete translations.
     */
    public static function bootTranslatable()
    {
        static::deleting(function ($model) {
            $model->translations()->delete();
        });
    }

    /**
     * @param string $languageId
     * @return TranslationCollection
     */
    public function translate($languageId = null)
    {
        if (! $languageId) {
            $languageId = config('app.locale');
        }

        if (! $this->translationCollection || $this->translationCollection->getLanguageId() !== $languageId) {
            $translations = $this->translations->where('language_id', $languageId);
            $this->translationCollection = new TranslationCollection($this, $translations, $languageId);
        }

        return $this->translationCollection;
    }


    /**
     * @param $attributeName
     * @param $value
     * @param string $languageId
     * @return mixed
     */
    public function createTranslation($attributeName, $value, $languageId = 'en')
    {
        return $this->translations()->create([
            'translatable_attribute' => $attributeName,
            'translation' => $value,
            'language_id' => $languageId
        ]);
    }

    /**
     * @param $translations
     * @param string $languageId
     * @return mixed
     */
    public function createTranslations($translations, $languageId = 'en')
    {
        return collect($translations)->map(function ($translation, $attribute) use ($languageId) {
            return $this->createTranslation(
                $attribute,
                $translation,
                $languageId
            );
        });
    }


    /**
     * @param $attributeName
     * @param $value
     * @param string $languageId
     * @return mixed
     */
    public function updateTranslation($attributeName, $value, $languageId = 'en')
    {
        return $this->translations()
            ->updateOrCreate([
                'translatable_attribute' => $attributeName,
                'language_id' => $languageId
            ], [
                'translation' => $value,
            ]);
    }

    /**
     * @param $translations
     * @param string $languageId
     * @return mixed
     */
    public function updateTranslations($translations, $languageId = 'en')
    {
        return collect($translations)->map(function ($translation, $attribute) use ($languageId) {
            return $this->updateTranslation($attribute, $translation, $languageId);
        });
    }

    /**
     * @param $attributeName
     * @param string $languageId
     * @return mixed
     */
    public function getTranslation($attributeName, $languageId = 'en')
    {
        return $this->translations()
            ->where(['translatable_attribute' => $attributeName, 'language_id' => $languageId])
            ->first();
    }

    /**
     * @return mixed
     */
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}

class TranslationCollection
{
    /**
     * @var
     */
    protected $entity;

    /**
     * @var Collection
     */
    protected $translations;

    /**
     * @var
     */
    protected $languageId;

    /**
     * TranslationCollection constructor.
     * @param $entity
     * @param $translations
     * @param $languageId
     */
    public function __construct($entity, $translations, $languageId)
    {
        $this->entity = $entity;
        $this->translations = $translations;
        $this->languageId = $languageId;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $fallback = $this->entity->{$name};

        if ($this->languageId == 'ar') {
            return $fallback;
        }

        $match = $this->translations->where('translatable_attribute', $name)->first();

        if ($match) {
            return $match->translation ?: $fallback;
        }

        return $fallback;
    }

    /**
     * @return mixed
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }
}
