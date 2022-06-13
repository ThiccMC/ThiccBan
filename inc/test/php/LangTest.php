<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LangTest extends TestCase {
    public function testLanguages(): void {
        echo "\n";

        $dir = './lang';
        $langs = glob("$dir/*.php");
        foreach ($langs as $lang) {
            require_once $lang;
            $lang_class = $lang;
            $lang_class = substr($lang_class, strlen("$dir/")); // grab "en_US.utf8.php" from "./lang/en_US.utf8.php"
            $lang_class = substr($lang_class, 0, strpos($lang_class, ".")); // grab "en_US" from "en_US.utf8.php"

            echo("Testing $lang_class ($lang)... ");

            $instance = new $lang_class;
            self::assertIsArray($instance->array);
            self::assertNotEmpty($instance->array);
            self::assertContainsOnly("string", $instance->array);

            $count = count($instance->array);
            echo "Success. $count messages defined.\n";
            if ($instance->version <= 0) {
                echo "Outdated file: $lang\n";
            }
        }
    }
}
