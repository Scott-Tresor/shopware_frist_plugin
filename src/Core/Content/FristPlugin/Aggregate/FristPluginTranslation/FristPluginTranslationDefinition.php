<?php

declare(strict_types=1);

namespace  SwagFristPlugin\Core\Content\FristPlugin\Aggregate\FristPluginTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CustomFields;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class FristPluginTranslationDefinition extends EntityDefinition
{

    public const ENTITY_NAME = 'swag_frist_plugin';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return FristPluginTranslationCollection::class;
    }

    public function getEntityClass(): string
    {
        return FristPluginTranslationEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new BoolField('activate', 'activate'),
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('firstname', 'firstname'))->addFlags(new Required()),
            (new StringField('role', 'role'))->addFlags(new Required()),
            (new StringField('images', 'images'))->addFlags(new Required()),
            (new StringField('website', 'website')),

            new CustomFields()
        ]);
    }
}
