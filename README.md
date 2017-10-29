Emoji-api
=========

### EMOJIS REST API


This API provides an Emojis description in different languages.

### How does it works ?

You have acess to all emojis availables in this url [www.smaine.me/api/emojis]("http://www.smaine.me/api/emojis")

If you want a specific language add the language parameter at the end of the url.
Example: [www.smaine.me/api/emojis/french]("http://www.smaine.me/api/emojis/french")


## Contribute
It's a free open source project thanks to these contributors :
* [Tonioverzeworld]("https://github.com/Tonioverzeworld")
* [Tamer]("https://github.com/tamer-dev")

#### Add Emoji

Actually not all of emojis are availables if you want to contribute and add others, please follow these instructions :

* Make Sure that the emoji itself or the translation/description doesn't exist yet !
* The emoji's data should come from [here]("https://apps.timwhitlock.info/emoji/tables/unicode")
* Open [emojis.yml]("https://github.com/ismail1432/emoji-api/blob/master/app/config/fixtures/emojis.yml"), add the emoji following these rules :

```yaml
category:
    datas:
        unicode: description
```
If the description is English there is no need to add the description so you can do a Pull Request

#### Add a description in an other language than english
* Make sure that the emoji exist in [emojis.yml]("https://github.com/ismail1432/emoji-api/blob/master/app/config/fixtures/emojis.yml")
* All translations are in the [translation]("https://github.com/ismail1432/emoji-api/tree/master/app/config/fixtures/translation") directory.
* If you add a new language create the file / if the language exist open it and add information following theses rules
```yaml
language:
    datas:
        emoji-description-in-/https://github.com/ismail1432/emoji-api/blob/master/app/config/fixtures/emojis.yml: language-translation
```
* Do a Pull request

