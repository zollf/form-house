# Form House
An intermediate place to store data before shipped off again. We are not a form builder, but rather a place to create a validation process, store your data, view, perform analysis and send via integrable api

## Install
TODO

## Running Locally
**Disclaimer** Since this is a Craft CMS Plugin, you'll need to run this within craft itself, or an instance that has craft.

### With Docker
Typically we use docker to run craft cms and then bind the volume.
```yaml
craft:
    image: craftcms/nginx:8.0-dev
    ...
    volumes:
      - ~/git/form-house:/app/vendor/form-house/form-house
```

### Working with Dev Branch
Since we are in alpha, no version have been officially released. To work with this plugin, add it to the `repositories` key in `composer.json` like so
```json
"repositories": {
  "formhouse": {
    "type": "vcs",
    "url": "https://github.com/zollf/form-house.git"
  }
},
```
Then require it.
```bash
composer require form-house/form-house
```
or
```
composer require form-house/form-house:dev-{branch-name}
```

### Running with Webpack
This plugin works with compiled React scripts. You'll need to run a separate terminal to watch for changes using `yarn dev`. 

## Tests
TODO