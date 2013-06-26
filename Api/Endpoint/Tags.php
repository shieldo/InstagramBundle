<?php
/*
 * This file is part of the Eko\InstagramBundle Symfony bundle.
 *
 * (c) Vincent Composieux <vincent.composieux@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eko\InstagramBundle\Api\Endpoint;

use Eko\InstagramBundle\Api\Endpoint\Endpoint;

/**
 * Media
 *
 * This class is used to interact with Tags endpoint of Instagram API
 *
 * @author Vincent Composieux <vincent.composieux@gmail.com>
 * @author Calum Brodie <calum@usemarkup.com>
 */
class Tags extends Endpoint
{
    /**
     * Returns information about a tag object
     *
     * @api /v1/media/{tag}
     *
     * @param integer $tagName Name of the tag
     *
     * @return \stdClass
     */
    public function getTagInformation($tag)
    {
        $url = sprintf('/v1/tags/%s',$tagName);

        return $this->executeRequest('get', $url);
    }

    /**
     * Returns a list of recent media for a given tag name
     *
     * @api /vi/tags/{tag}/media/recent
     *
     * @return \stdClass
     */
    public function getRecentByTag($tag, $options)
    {
        $url = sprintf('/v1/tags/%s/media/recent', $tag);

        return $this->executeRequest('get', $url, $options);
    }

    /**
     * Returns a list of what media is most popular at the moment
     *
     * @api /v1/tags/search
     *
     * @param  $tag The name of tags to search
     * @return \stdClass
     */
    public function searchTags($tag)
    {
        $url = '/v1/tags/search';
        $options['q'] = $tag;

        return $this->executeRequest('get', $url, $options);
    }
}
