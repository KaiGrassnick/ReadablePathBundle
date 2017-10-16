# Allow readable image (thumbnails) path
Add a thumbnail-filter which allows us to use the image name as a readable path

To allow a new type, we have to overwrite the original FormatThumbnail function 

## Requirements
- Symfony
- SonataAdmin

## How to install
1. Add path to parameters.yml
`sonata.media.thumbnail.format: "KaiGrassnick\ReadablePathBundle\Thumbnail\FormatThumbnail"`
2. Add `new KaiGrassnick\ReadablePathBundle\KaiGrassnickReadablePathBundle()` to `AppKernel.php`
2. Done! Now we have a new thumbnail format

## How to use
```
$provider = $this->get("sonata.media.provider.image");
$provider->generatePublicUrl($media, 'readable');
```


## License
- MIT


## Credits
- Kai Grassnick