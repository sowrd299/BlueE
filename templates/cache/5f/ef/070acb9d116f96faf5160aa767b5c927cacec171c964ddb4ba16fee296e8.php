<?php

/* post_form.html */
class __TwigTemplate_5fef070acb9d116f96faf5160aa767b5c927cacec171c964ddb4ba16fee296e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form name=\"post\" onsubmit=\"return dopost(this);\" enctype=\"multipart/form-data\" action=\"";
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_url");
        echo "\" method=\"post\">
";
        // line 2
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
        echo "
";
        // line 3
        if ((isset($context["id"]) ? $context["id"] : null)) {
            echo "<input type=\"hidden\" name=\"thread\" value=\"";
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "\">";
        }
        // line 4
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
        echo "
<input type=\"hidden\" name=\"board\" value=\"";
        // line 5
        echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri");
        echo "\">
";
        // line 6
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
        echo "
";
        // line 7
        if ((isset($context["current_page"]) ? $context["current_page"] : null)) {
            // line 8
            echo "\t<input type=\"hidden\" name=\"page\" value=\"";
            echo (isset($context["current_page"]) ? $context["current_page"] : null);
            echo "\">
";
        }
        // line 10
        if ((isset($context["mod"]) ? $context["mod"] : null)) {
            echo "<input type=\"hidden\" name=\"mod\" value=\"1\">";
        }
        // line 11
        echo "\t<table>
\t\t";
        // line 12
        if (((!$this->getAttribute((isset($context["config"]) ? $context["config"] : null), "field_disable_name")) || ((isset($context["mod"]) ? $context["mod"] : null) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "bypass_field_disable"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))))) {
            echo "<tr>
\t\t\t<th>
\t\t\t\t";
            // line 14
            echo gettext("Name");
            // line 15
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"text\" name=\"name\" size=\"25\" maxlength=\"35\" autocomplete=\"off\">
\t\t\t\t";
            // line 19
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</td>
\t\t</tr>";
        }
        // line 22
        echo "\t\t";
        if (((!$this->getAttribute((isset($context["config"]) ? $context["config"] : null), "field_disable_email")) || ((isset($context["mod"]) ? $context["mod"] : null) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "bypass_field_disable"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))))) {
            echo "<tr>
\t\t\t<th>
\t\t\t\t";
            // line 24
            echo gettext("Email");
            // line 25
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"text\" name=\"email\" size=\"25\" maxlength=\"40\" autocomplete=\"off\">
\t\t\t\t";
            // line 29
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</td>
\t\t</tr>";
        }
        // line 32
        echo "\t\t<tr>
\t\t\t";
        // line 33
        if (((!($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "field_disable_subject") || ((isset($context["id"]) ? $context["id"] : null) && $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "field_disable_reply_subject")))) || ((isset($context["mod"]) ? $context["mod"] : null) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "bypass_field_disable"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))))) {
            echo "<th>
\t\t\t\t";
            // line 34
            echo gettext("Subject");
            // line 35
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input style=\"float:left;\" type=\"text\" name=\"subject\" size=\"25\" maxlength=\"100\" autocomplete=\"off\">
\t\t\t";
        } else {
            // line 39
            echo "<th>
\t\t\t\t";
            // line 40
            echo gettext("Submit");
            // line 41
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t";
        }
        // line 45
        echo "\t\t\t\t<input accesskey=\"s\" style=\"margin-left:2px;\" type=\"submit\" name=\"post\" value=\"";
        if ((isset($context["id"]) ? $context["id"] : null)) {
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "button_reply");
        } else {
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "button_newtopic");
        }
        echo "\" />";
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "spoiler_images")) {
            echo " <input id=\"spoiler\" name=\"spoiler\" type=\"checkbox\"> <label for=\"spoiler\">";
            echo gettext("Spoiler Image");
            echo "</label>";
        }
        // line 46
        echo "\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>
\t\t\t\t";
        // line 50
        echo gettext("Comment");
        // line 51
        echo "\t\t\t\t";
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
        echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<textarea name=\"body\" id=\"body\" rows=\"5\" cols=\"35\"></textarea>
\t\t\t\t";
        // line 55
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
        echo "
\t\t\t</td>
\t\t</tr>
\t\t";
        // line 58
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "recaptcha")) {
            // line 59
            echo "\t\t<tr>
\t\t\t<th>
\t\t\t\t";
            // line 61
            echo gettext("Verification");
            // line 62
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<script type=\"text/javascript\" src=\"//www.google.com/recaptcha/api/challenge?k=";
            // line 65
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "recaptcha_public");
            echo "\"></script>
\t\t\t\t";
            // line 66
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</td>
\t\t</tr>
\t\t";
        }
        // line 70
        echo "\t\t<tr>
\t\t\t<th>
\t\t\t\t";
        // line 72
        echo gettext("File");
        // line 73
        echo "\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"file\" name=\"file\">
\t\t\t\t";
        // line 76
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "allow_upload_by_url")) {
            // line 77
            echo "\t\t\t\t\t<br>
\t\t\t\t\t<div style=\"float:none;text-align:left\">
\t\t\t\t\t\t<label for=\"file_url\">";
            // line 79
            echo gettext("Or URL");
            echo "</label>: 
\t\t\t\t\t\t<input style=\"display:inline\" type=\"text\" id=\"file_url\" name=\"file_url\" size=\"35\">
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 83
        echo "\t\t\t\t";
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
        echo "
\t\t\t</td>
\t\t</tr>
\t\t";
        // line 86
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "enable_embedding")) {
            // line 87
            echo "\t\t<tr>
\t\t\t<th>
\t\t\t\t";
            // line 89
            echo gettext("Embed");
            // line 90
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"text\" name=\"embed\" size=\"30\" maxlength=\"120\" autocomplete=\"off\">
\t\t\t\t";
            // line 94
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</td>
\t\t</tr>
\t\t";
        }
        // line 98
        echo "\t\t";
        if (((isset($context["mod"]) ? $context["mod"] : null) && ((((!(isset($context["id"]) ? $context["id"] : null)) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "sticky"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))) || ((!(isset($context["id"]) ? $context["id"] : null)) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "lock"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri")))) || twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "rawhtml"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))))) {
            // line 99
            echo "\t\t<tr>
\t\t\t<th>
\t\t\t\t";
            // line 101
            echo gettext("Flags");
            // line 102
            echo "\t\t\t</th>
\t\t\t<td>
\t\t\t\t";
            // line 104
            if (((!(isset($context["id"]) ? $context["id"] : null)) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "sticky"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri")))) {
                echo "<div>
\t\t\t\t\t<label for=\"sticky\">";
                // line 105
                echo gettext("Sticky");
                echo "</label>
\t\t\t\t\t<input title=\"";
                // line 106
                echo gettext("Sticky");
                echo "\" type=\"checkbox\" name=\"sticky\" id=\"sticky\"><br>
\t\t\t\t</div>";
            }
            // line 108
            echo "\t\t\t\t";
            if (((!(isset($context["id"]) ? $context["id"] : null)) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "lock"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri")))) {
                echo "<div>
\t\t\t\t\t<label for=\"lock\">";
                // line 109
                echo gettext("Lock");
                echo "</label><br>
\t\t\t\t\t<input title=\"";
                // line 110
                echo gettext("Lock");
                echo "\" type=\"checkbox\" name=\"lock\" id=\"lock\">
\t\t\t\t</div>";
            }
            // line 112
            echo "\t\t\t\t";
            if (twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "rawhtml"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))) {
                echo "<div>
\t\t\t\t\t<label for=\"raw\">";
                // line 113
                echo gettext("Raw HTML");
                echo "</label><br>
\t\t\t\t\t<input title=\"";
                // line 114
                echo gettext("Raw HTML");
                echo "\" type=\"checkbox\" name=\"raw\" id=\"raw\">
\t\t\t\t</div>";
            }
            // line 116
            echo "\t\t\t</td>
\t\t</tr>
\t\t";
        }
        // line 119
        echo "\t\t";
        if (((!$this->getAttribute((isset($context["config"]) ? $context["config"] : null), "field_disable_password")) || ((isset($context["mod"]) ? $context["mod"] : null) && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "bypass_field_disable"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"))))) {
            echo "<tr>
\t\t\t<th>
\t\t\t\t";
            // line 121
            echo gettext("Password");
            // line 122
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"password\" name=\"password\" size=\"12\" maxlength=\"18\" autocomplete=\"off\"> 
\t\t\t\t<span class=\"unimportant\">";
            // line 126
            echo gettext("(For file deletion.)");
            echo "</span>
\t\t\t\t";
            // line 127
            echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(), "method");
            echo "
\t\t\t</td>
\t\t</tr>";
        }
        // line 130
        echo "\t</table>
";
        // line 131
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "html", array(0 => true), "method");
        echo "
<input type=\"hidden\" name=\"hash\" value=\"";
        // line 132
        echo $this->getAttribute((isset($context["antibot"]) ? $context["antibot"] : null), "hash", array(), "method");
        echo "\">
</form>

<script type=\"text/javascript\">";
        // line 137
        echo "
\trememberStuff();
";
        echo "</script>
";
    }

    public function getTemplateName()
    {
        return "post_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  341 => 131,  332 => 127,  328 => 126,  318 => 121,  307 => 116,  302 => 114,  293 => 112,  274 => 106,  270 => 105,  266 => 104,  262 => 102,  256 => 99,  253 => 98,  236 => 89,  216 => 79,  212 => 77,  199 => 70,  192 => 66,  188 => 65,  181 => 62,  175 => 59,  173 => 58,  159 => 51,  157 => 50,  151 => 46,  138 => 45,  130 => 41,  125 => 39,  93 => 25,  91 => 24,  85 => 22,  69 => 14,  61 => 11,  57 => 10,  49 => 7,  45 => 6,  41 => 5,  31 => 3,  89 => 14,  71 => 15,  59 => 8,  51 => 8,  43 => 6,  37 => 4,  27 => 2,  294 => 59,  277 => 53,  275 => 52,  241 => 50,  222 => 49,  215 => 45,  210 => 76,  206 => 43,  202 => 42,  198 => 41,  195 => 40,  189 => 39,  179 => 61,  165 => 34,  127 => 30,  124 => 29,  122 => 28,  117 => 25,  110 => 33,  107 => 32,  101 => 29,  95 => 19,  79 => 19,  56 => 12,  39 => 9,  30 => 6,  28 => 5,  403 => 108,  397 => 106,  394 => 105,  391 => 104,  383 => 102,  367 => 98,  360 => 96,  357 => 95,  351 => 137,  345 => 132,  343 => 90,  338 => 130,  336 => 88,  320 => 122,  305 => 78,  297 => 76,  295 => 75,  289 => 57,  285 => 55,  282 => 71,  279 => 108,  273 => 68,  265 => 66,  263 => 65,  260 => 101,  257 => 51,  248 => 60,  246 => 94,  239 => 58,  237 => 57,  228 => 54,  226 => 53,  217 => 46,  211 => 49,  205 => 73,  203 => 72,  197 => 43,  191 => 42,  176 => 38,  167 => 55,  156 => 34,  148 => 33,  140 => 31,  129 => 31,  123 => 26,  120 => 25,  116 => 35,  114 => 34,  111 => 21,  99 => 19,  97 => 18,  86 => 13,  75 => 13,  64 => 12,  62 => 8,  44 => 11,  38 => 3,  562 => 154,  559 => 152,  555 => 150,  550 => 149,  547 => 144,  544 => 143,  541 => 142,  535 => 140,  532 => 139,  529 => 134,  527 => 133,  524 => 132,  522 => 131,  519 => 130,  513 => 128,  510 => 127,  507 => 126,  498 => 123,  487 => 121,  484 => 120,  481 => 119,  475 => 117,  471 => 115,  468 => 114,  465 => 113,  462 => 112,  456 => 110,  452 => 108,  449 => 107,  446 => 106,  443 => 105,  437 => 103,  433 => 101,  430 => 100,  428 => 99,  423 => 97,  417 => 96,  410 => 95,  404 => 93,  402 => 92,  393 => 90,  374 => 99,  369 => 86,  366 => 85,  358 => 83,  355 => 82,  349 => 80,  346 => 79,  342 => 77,  340 => 76,  337 => 75,  325 => 73,  323 => 72,  309 => 61,  303 => 68,  301 => 67,  298 => 113,  292 => 64,  290 => 63,  288 => 110,  284 => 109,  278 => 60,  269 => 59,  261 => 57,  254 => 62,  247 => 54,  244 => 53,  238 => 90,  232 => 87,  230 => 86,  225 => 47,  223 => 83,  213 => 44,  209 => 42,  201 => 39,  194 => 38,  186 => 38,  184 => 41,  178 => 39,  174 => 32,  168 => 30,  162 => 28,  154 => 26,  152 => 25,  149 => 33,  143 => 32,  137 => 20,  135 => 19,  128 => 40,  126 => 17,  121 => 16,  115 => 14,  113 => 13,  102 => 11,  90 => 17,  88 => 6,  83 => 15,  80 => 3,  77 => 14,  72 => 12,  67 => 159,  35 => 1,  33 => 3,  26 => 104,  24 => 1,  398 => 296,  382 => 88,  326 => 86,  317 => 240,  312 => 119,  240 => 232,  185 => 163,  171 => 31,  169 => 100,  146 => 23,  136 => 79,  134 => 78,  132 => 32,  98 => 76,  96 => 43,  92 => 15,  84 => 43,  82 => 38,  73 => 12,  66 => 10,  58 => 7,  52 => 6,  22 => 1,);
    }
}
