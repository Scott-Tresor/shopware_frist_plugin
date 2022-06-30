<?php

declare(strict_types=1);

namespace SwagFristPlugin\StoreFront\Controller\Api;

use Faker\Factory;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(defaults={"_routeScope"={"storefront"}})
 */
class DemonDataController extends StorefrontController
{
    /**
     * @var EntityRepositoryInterface
     */
    private EntityRepositoryInterface $swagFristPlugin;

    public function __construct(EntityRepositoryInterface $swagFristPlugin)
    {
        $this->swagFristPlugin = $swagFristPlugin;
    }

    /**
     * @Route(
     *     "/api/v{version}/_action/swag-frist-plugin/generate",
     *     name="api.custom.sag_frist_plugin.generate",
     *     methods={"POST"}
     * )
     * @param Context $context
     * @return Response
     */
    public function generate(Context $context): Response
    {
        $factory = Factory::create();
        $data = [];
        for ($i = 0; $i < 3; $i++){
            $data[] = [
                'id' => Uuid::randomHex(),
                'activate' => true,
                'name' => $factory->name,
                'firstname' => $factory->firstName,
                'role' => $factory->jobTitle,
                'images' => $factory->image('', 200, 200),
                'website' => $factory->url
            ];
        }
        $this->swagFristPlugin->create($data, $context);

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
