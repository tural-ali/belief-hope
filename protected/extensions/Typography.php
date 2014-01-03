<?

class Typography
{

    public function  __construct()
    {
        mb_internal_encoding('UTF-8');
    }

    public function sentenceCase($str)
    {
        $cap = true;
        $ret = '';
        for ($x = 0; $x < mb_strlen($str); $x++) { // mb_strlen instead
            $letter = mb_substr($str, $x, 1); // mb_substr instead
            if ($letter == "." || $letter == "!" || $letter == "?") {
                $cap = true;
            } elseif ($letter != " " && $cap == true) {
                $letter = mb_strtoupper($letter); // mb_strtoupper instead
                $cap = false;
            }
            $ret .= $letter;
        }
        return $ret;
    }


    public static function tlit($str)
    {
        $orig = array('а', 'б', 'в', 'г', 'д', 'е', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у',
            'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ь', 'ю', 'я', 'ы', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
            'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ь', 'Ю', 'Я', 'Ы', "ə", "ü", "i", "ö", "ı", "ç", 'ş', "ğ", "Ə", "Ü", "İ", "Ö", "I", "Ç", 'Ş', "Ğ");
        $tlit = array('a', 'b', 'v', 'g', 'd', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u',
            'f', 'h', 'ts', 'ch', 'sh', 'sht', 'a', 'y', 'yu', 'ya', 'i', 'A', 'B', 'V', 'G', 'D', 'E', 'Zh',
            'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U',
            'F', 'H', 'Ts', 'Ch', 'Sh', 'Sht', 'A', 'Y', 'Yu', 'Ya', 'I', "e", "u", "i", "o", "i", "c", 'sh', "g", "E", "U", "I", "O", "I", "C", 'Sh', "G");

        return $textcyr = str_replace($orig, $tlit, $str);
    }


    public static function MakeToken($str)
    {
        $translitStr = self::tlit($str);
        $token = trim(strtolower($translitStr));

        $tokenarr = explode(" ", $token);
        $token = trim($tokenarr[0]);
        return $token;
    }


    public static function truncate($str, $n, $delim = '…')
    {
        $parts = preg_split('/([\s\n\r]+)/', $str, null, PREG_SPLIT_DELIM_CAPTURE);
        $parts_count = count($parts);

        $length = 0;
        $last_part = 0;
        for (; $last_part < $parts_count; ++$last_part) {
            $length += strlen($parts[$last_part]);
            if ($length > $n) {
                break;
            }
        }
        $result = implode(array_slice($parts, 0, $last_part));

        return $result . $delim;
    }

}
