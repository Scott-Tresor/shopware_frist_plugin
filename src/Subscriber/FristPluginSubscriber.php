<?php

declare(strict_types=1);

namespace  SwagFristPlugin\Subscriber;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FristPluginSubscriber implements EventSubscriberInterface
{
    protected SystemConfigService  $configService;

    protected EntityRepositoryInterface $ShowInStorefront;

    public function __construct(
        SystemConfigService $config,
        EntityRepositoryInterface  $ShowInStorefront
    )
    {
        $this->configService = $config;
        $this->ShowInStorefront = $ShowInStorefront;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            FooterPageletLoadedEvent::class => 'onFooterPageletLoader',
        ];
    }

    public function onFooterPageletLoader(FooterPageletLoadedEvent  $event)
    {
        if (!$this->configService->get('SwagFristPlugin.config.ShowInStorefront')){
            return;
        }

        $teams = $this->fetchTeams($event->getContext());

        $event->getPagelet()->addExtension('swag_frist_plugin', $teams);
    }

    private function fetchTeams(Context $getContext): EntityCollection
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('activate', '1'));
        $criteria->setLimit(3);

        return $this->ShowInStorefront->search($criteria, $getContext)->getEntities();
    }
}
