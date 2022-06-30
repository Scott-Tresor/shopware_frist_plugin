<?php

declare(strict_types=1);

namespace SwagFristPlugin\Core\Content\FristPlugin\Aggregate\FristPluginTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                          add(FristPluginTranslationEntity $entity)
 * @method void                          set(string $key, FristPluginTranslationEntity $entity)
 * @method FristPluginTranslationEntity[]    getIterator()
 * @method FristPluginTranslationEntity[]    getElements()
 * @method FristPluginTranslationEntity|null get(string $key)
 * @method FristPluginTranslationEntity|null first()
 * @method FristPluginTranslationEntity|null last()
 */
class FristPluginTranslationCollection extends EntityCollection
{
    public function filterByFristPluginId(string $id): self
    {
        return $this->filter(function (FristPluginTranslationEntity $entity) use ($id) {
            return $entity->getId() === $id;
        });
    }

    protected function getExpectedClass(): string
    {
        return FristPluginTranslationEntity::class;
    }
}
