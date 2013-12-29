<div id="lang">
    <?
    $lastElement = end($languages);
    foreach ($languages as $key => $lang) {
        $class = ($key == $currentLang) ? "active" : "";
        $url = $this->getOwner()->createMultilanguageReturnUrl($key);
        echo "<a href='/$lang' class='lang transition $class'>$lang</a>";
        if ($lang != $lastElement)
            echo ' | ';
    }
    ?>
</div>
