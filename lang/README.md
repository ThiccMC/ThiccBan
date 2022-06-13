To use an existing locale:
- Open `inc/settings.php` with a text editor
- Find the `lang` option and set it to the locale you want to use.
Example: `$this->lang = 'es_ES.utf8';`

-----

To create a new locale (example being "es_ES"):
- Copy lang/en_US.utf8.php to a new file (e.g. `lang/es_ES.utf8.php`)
- Edit the new file, change "class en_US" to "class es_ES" so it looks like this:

```
<?php
class es_ES {
    public function __construct() {
       ...
    }
}
```
- Translate all array assignments, e.g. `$array["title.bans"] = 'Baneos';`
- Edit inc/settings.php, set `this->lang` to your locale. Example: `$this->lang = 'es_ES.utf8';`

All messages not translated by the main locale will be translated by the fallback locale (en_US.utf8).
Thus, if new messages are added to en_US, those new messages will be in English until your locale is updated to include translations for the new messages.
