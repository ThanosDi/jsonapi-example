<?php
/**
 * Copyright 2015-2016 Xenofon Spafaridis
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Phramework\Examples\JSONAPI\Controllers;

use Phramework\Phramework;
use Phramework\Examples\JSONAPI\Models\Article;

/**
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 */
class ArticleController extends \Phramework\Examples\JSONAPI\Controller
{
    /**
     * Get collection
     * `/article/{id}/relationships/{relationship}` handler
     * @param array  $params       Request parameters
     * @param string $method       Request method
     * @param array  $headers      Request headers
     */
    public static function GET($params, $method, $headers)
    {
        self::handleGET(
            $params,
            Article::class,
            [],
            [],
            true
        );
    }

    /**
     * Get a resource
     * `/article/{id}/relationships/{relationship}` handler
     * @param array  $params       Request parameters
     * @param string $method       Request method
     * @param array  $headers      Request headers
     * @param string $id           Resource id
     */
    public static function GETById($params, $method, $headers, $id)
    {
        $id = \Phramework\Validate\UnsignedIntegerValidator::parseStatic($id);

        self::handleGETById(
            $params,
            $id,
            Article::class,
            [],
            []
        );
    }

    /**
     * Manage resource's relationships
     * `/article/{id}/relationships/{relationship}` handler
     * @param array  $params       Request parameters
     * @param string $method       Request method
     * @param array  $headers      Request headers
     * @param string $id           Resource id
     * @param string $relationship Relationship
     */
    public static function byIdRelationships($params, $method, $headers, $id, $relationship)
    {
        $id = \Phramework\Validate\UnsignedIntegerValidator::parseStatic($id);

        parent::handleByIdRelationships(
            $params,
            $method,
            $headers,
            $id,
            $relationship,
            Article::class,
            [Phramework::METHOD_GET],
            [],
            []
        );
    }
}