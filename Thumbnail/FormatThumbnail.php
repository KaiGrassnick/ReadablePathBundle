<?php
/**
 * @author    Kai Grassnick <kai@kai-grassnick.de>
 *
 * MIT License
 *
 * Copyright (c) 2017 Kai Grassnick
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace KaiGrassnick\ReadablePathBundle\Thumbnail;

use Sonata\MediaBundle\Model\MediaInterface;
use Sonata\MediaBundle\Provider\MediaProviderInterface;

class FormatThumbnail extends \Sonata\MediaBundle\Thumbnail\FormatThumbnail
{

    /**
     * {@inheritdoc}
     */
    public function generatePublicUrl(MediaProviderInterface $provider, MediaInterface $media, $format)
    {
        if ($format == 'reference') {
            $path = $provider->getReferenceImage($media);
        } elseif ($format == 'readable') {
            $path = sprintf('%s/%s/%s/%s.%s', $provider->generatePath($media), $media->getId(), $format,
                $media->getName(), $this->getExtension($media));
        } else {
            $path = sprintf('%s/thumb_%s_%s.%s', $provider->generatePath($media), $media->getId(), $format,
                $this->getExtension($media));
        }

        return $path;
    }
}