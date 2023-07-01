<?php

namespace Camunda;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseClient
{
    protected Client $client;

    protected Serializer $serializer;

    public function __construct(string $host)
    {
        $this->client = new Client([
            'base_uri' => $host,
//            'debug' => true,
//            'proxy' => [
//                'http'  => 'http://127.0.0.1:8888'
//            ]
        ]);
        $this->serializer = $this->configureSerializer();
    }

    private function configureSerializer(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        return new Serializer(
            [
                new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter),
                new ArrayDenormalizer()
            ],
            [new JsonEncoder()]
        );
    }

    protected function deserializeResponse(ResponseInterface $response, string $class)
    {
        // check content type
        $contentType = $response->getHeaderLine('Content-Type');
        if ($contentType !== 'application/json') {
            throw new RuntimeException('Invalid content type: ' . $contentType);
        }
        return $this->serializer->deserialize($response->getBody()->getContents(), $class, 'json');
    }

}