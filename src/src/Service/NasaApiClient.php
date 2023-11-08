<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NasaApiClient implements IApiClient
{

    /**
     * @throws GuzzleException
     */
    public function search(string $query, string $mediaType): array
    {
        $endpoint = $_ENV["NASA_API_ENDPOINT"];
        $client = new Client();
        $response = $client->request(
            "GET",
            $endpoint . "/search",
            [
                "query" =>
                    [
                        "q" => $query,
                        "media_type" => $mediaType
                    ]
            ]
        );
        $data = json_decode($response->getBody(), true);
        $assets = [];

        if ($data && is_array($data) && isset($data["collection"]["items"])) {
            foreach ($data["collection"]["items"] as $item) {
                $assets[] = [
                    "nasa_id" => $this->getMetaDataByName("nasa_id", $item),
                    "title" => $this->getMetaDataByName("title", $item),
                    "description" => $this->getMetaDataByName("description", $item),
                    "media_type" => $this->getMetaDataByName("media_type", $item),
                    "image" => $this->getMetaDataByName("image", $item),
                ];
            }
        }

        return $assets;
    }

    /**
     * @throws GuzzleException
     */
    public function getAsset(string $nasa_id): array
    {
        $endpoint = $_ENV["NASA_API_ENDPOINT"];
        $client = new Client();
        $response = $client->request(
            "GET",
            $endpoint . "/asset/" . $nasa_id
        );
        $data = json_decode($response->getBody(), true);
        $media = [];

        if ($data && is_array($data) && isset($data["collection"]["items"])) {
            foreach ($data["collection"]["items"] as $item) {

                if (strpos($item["href"], "/image/") && strpos($item["href"], "jpg")) {
                    $media[] = $item["href"];
                }

                if (strpos($item["href"], "/video/") && strpos($item["href"], "mp4")) {
                    $media[] = $item["href"];
                }
            }
        }

        return $media;
    }

    private function getMetaDataByName(string $metaDataName, array $item): string
    {
        if ($metaDataName === "nasa_id" && isset($item["data"][0]["nasa_id"])) {
            return $item["data"][0]["nasa_id"];
        }

        if ($metaDataName === "title" && isset($item["data"][0]["title"])) {
            return $item["data"][0]["title"];
        }

        if ($metaDataName === "description" && isset($item["data"][0]["description"])) {
            return $item["data"][0]["description"];
        }

        if ($metaDataName === "media_type" && isset($item["data"][0]["media_type"])) {
            return $item["data"][0]["media_type"];
        }

        if ($metaDataName === "image" && isset($item["links"]) && is_array($item["links"])) {
            foreach ($item["links"] as $link) {
                if (isset($link["render"]) && $link["render"] === "image") {
                    return $link["href"];
                }
            }
        }

        return "";
    }
}
