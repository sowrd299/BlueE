<?php

/* post_reply.html */
class __TwigTemplate_6bd21e7f4a6df8382386989e90ce9acbbc239b2ecde023006a9bffd46f64ea09 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_236ffe6d330c5c68226209be42db97bee54cbce72d2b1871e1c3b0c0cc39e525' => array($this, 'block___internal_236ffe6d330c5c68226209be42db97bee54cbce72d2b1871e1c3b0c0cc39e525'),
            '__internal_fbed9cec70ad48f04fce9d26807143be6e808a5c6e9c5de7e5439189098962ee' => array($this, 'block___internal_fbed9cec70ad48f04fce9d26807143be6e808a5c6e9c5de7e5439189098962ee'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo twig_remove_whitespace_filter((string) $this->renderBlock("__internal_236ffe6d330c5c68226209be42db97bee54cbce72d2b1871e1c3b0c0cc39e525", $context, $blocks));
        // line 104
        if ((isset($context["index"]) ? $context["index"] : null)) {
            echo truncate($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link"));
        } else {
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body");
        }
        echo twig_remove_whitespace_filter((string) $this->renderBlock("__internal_fbed9cec70ad48f04fce9d26807143be6e808a5c6e9c5de7e5439189098962ee", $context, $blocks));
    }

    // line 1
    public function block___internal_236ffe6d330c5c68226209be42db97bee54cbce72d2b1871e1c3b0c0cc39e525($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"post reply\" id=\"reply_";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\">

<p class=\"intro\"";
        // line 5
        if ((!(isset($context["index"]) ? $context["index"] : null))) {
            echo " id=\"";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
            echo "\"";
        }
        echo ">
\t<input type=\"checkbox\" class=\"delete\" name=\"delete_";
        // line 6
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\" id=\"delete_";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\" />
\t<label for=\"delete_";
        // line 7
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\">
\t\t";
        // line 8
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject")) > 0)) {
            // line 9
            echo "\t\t\t";
            // line 10
            echo "\t\t\t<span class=\"subject\">";
            echo bidi_cleanup($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject"));
            echo "</span> 
\t\t";
        }
        // line 12
        echo "\t\t";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email")) > 0)) {
            // line 13
            echo "\t\t\t";
            // line 14
            echo "\t\t\t<a class=\"email\" href=\"mailto:";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email");
            echo "\">
\t\t";
        }
        // line 16
        echo "\t\t";
        $context["capcode"] = capcode($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "capcode"));
        // line 17
        echo "\t\t<span ";
        if ($this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "name")) {
            echo "style=\"";
            echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "name");
            echo "\" ";
        }
        echo "class=\"name\">";
        echo bidi_cleanup($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "name"));
        echo "</span>
\t\t";
        // line 18
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "trip")) > 0)) {
            // line 19
            echo "\t\t\t<span ";
            if ($this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "trip")) {
                echo "style=\"";
                echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "trip");
                echo "\" ";
            }
            echo "class=\"trip\">";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "trip");
            echo "</span>
\t\t";
        }
        // line 21
        echo "\t\t";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email")) > 0)) {
            // line 22
            echo "\t\t\t";
            // line 23
            echo "\t\t\t</a>
\t\t";
        }
        // line 25
        echo "\t\t";
        if ((isset($context["capcode"]) ? $context["capcode"] : null)) {
            // line 26
            echo "\t\t\t";
            echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "cap");
            echo "
\t\t";
        }
        // line 28
        echo "\t\t";
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod") && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "show_ip"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri")))) {
            // line 29
            echo "\t\t\t [<a class=\"ip-link\" style=\"margin:0;\" href=\"?/IP/";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip");
            echo "\">";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip");
            echo "</a>]
\t\t";
        }
        // line 31
        echo "\t\t";
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "display_flags") && $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag"))) {
            // line 32
            echo "\t\t\t <img class=\"flag\" src=\"";
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_flags"), $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag"));
            echo "\"
\t\t\t \tstyle=\"";
            // line 33
            if ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag style", array(), "array")) {
                echo $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag style", array(), "array");
            } else {
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "flag_style");
            }
            echo "\"
\t\t\t ";
            // line 34
            if ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag alt", array(), "array")) {
                echo "alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag alt", array(), "array"), "html_attr");
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag alt", array(), "array"), "html_attr");
                echo "\"";
            }
            echo ">
\t\t";
        }
        // line 36
        echo "\t\t <time datetime=\"";
        echo twig_date_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"), "%Y-%m-%dT%H:%M:%S");
        echo twig_timezone_function();
        echo "\">";
        echo twig_date_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
        echo "</time>
\t</label>
\t";
        // line 38
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "poster_ids")) {
            // line 39
            echo "\t\t ID: ";
            echo poster_id($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thread"));
            echo "
\t";
        }
        // line 41
        echo "\t <a class=\"post_no\" onclick=\"return document.querySelectorAll('div.banner').length ? highlightReply(";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo ") : true;\" href=\"";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link");
        echo "\">No.</a>
\t<a class=\"post_no\" onclick=\"return document.querySelectorAll('div.banner').length ? citeReply(";
        // line 42
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo ") : true;\" href=\"";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link", array(0 => "q"), "method");
        echo "\">
\t\t";
        // line 43
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "
\t</a>
\t</p>
\t";
        // line 46
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "embed")) {
            // line 47
            echo "\t\t";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "embed");
            echo "
\t";
        } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file") == "deleted")) {
            // line 49
            echo "\t\t<img class=\"post-image deleted\" src=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_deleted");
            echo "\" alt=\"\" />
\t";
        } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file"))) {
            // line 51
            echo "\t\t<p class=\"fileinfo\">File: <a href=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
            echo "\">";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
            echo "</a> <span class=\"unimportant\">
\t\t(
\t\t\t";
            // line 53
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "spoiler")) {
                // line 54
                echo "\t\t\t\tSpoiler Image, 
\t\t\t";
            }
            // line 56
            echo "\t\t\t";
            echo format_bytes($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filesize"));
            echo "
\t\t\t";
            // line 57
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filewidth") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "fileheight"))) {
                // line 58
                echo "\t\t\t\t, ";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filewidth");
                echo "x";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "fileheight");
                echo "
\t\t\t\t";
                // line 59
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "show_ratio")) {
                    // line 60
                    echo "\t\t\t\t\t, ";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ratio");
                    echo "
\t\t\t\t";
                }
                // line 62
                echo "\t\t\t";
            }
            // line 63
            echo "\t\t\t";
            if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "show_filename") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename"))) {
                // line 64
                echo "\t\t\t\t, 
\t\t\t\t";
                // line 65
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")) > $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_filename_display"))) {
                    // line 66
                    echo "\t\t\t\t\t<span class=\"postfilename\" title=\"";
                    echo bidi_cleanup(twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")));
                    echo "\">";
                    echo bidi_cleanup(twig_escape_filter($this->env, twig_filename_truncate_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_filename_display"))));
                    echo "</span>
\t\t\t\t";
                } else {
                    // line 68
                    echo "\t\t\t\t\t<span class=\"postfilename\">";
                    echo bidi_cleanup(twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")));
                    echo "</span>
\t\t\t\t";
                }
                // line 70
                echo "\t\t\t";
            }
            // line 71
            echo "\t\t\t";
            if ((($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") != "file") && $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_identification"))) {
                // line 72
                echo "\t\t\t\t,
\t\t\t\t<span class='image_id'>
\t\t\t\t <a href=\"http://imgops.com/";
                // line 74
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                echo "\">io</a>
\t\t\t\t";
                // line 75
                if ((twig_extension_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file")) == "jpg")) {
                    // line 76
                    echo "\t\t\t\t\t <a href=\"http://regex.info/exif.cgi?url=";
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                    echo "\">e</a>
\t\t\t\t";
                }
                // line 78
                echo "\t\t\t\t <a href=\"http://www.google.com/searchbyimage?image_url=";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                echo "\">g</a>
\t\t\t\t <a href=\"http://www.tineye.com/search?url=";
                // line 79
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                echo "\">t</a>
\t\t\t\t</span>
\t\t\t";
            }
            // line 82
            echo "
\t\t)
\t\t</span>
</p>
\t<a href=\"";
            // line 86
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
            echo "\" target=\"_blank\"";
            if ((($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "file") || ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "is_file", array(), "array") == "1"))) {
                echo " class=\"file\"";
            }
            echo ">
\t<img class=\"post-image\" src=\"
\t\t";
            // line 88
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "file")) {
                // line 89
                echo "\t\t\t";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
                echo "
\t\t\t";
                // line 90
                if ($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_icons"), twig_extension_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")), array(), "array")) {
                    // line 91
                    echo "\t\t\t\t";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_thumb"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_icons"), twig_extension_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")), array(), "array"));
                    echo "
\t\t\t";
                } else {
                    // line 93
                    echo "\t\t\t\t";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_thumb"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_icons"), "default"));
                    echo "
\t\t\t";
                }
                // line 95
                echo "\t\t";
            } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "spoiler")) {
                // line 96
                echo "\t\t\t";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "spoiler_image");
                echo "
\t\t";
            } else {
                // line 98
                echo "\t\t\t";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_thumb");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb");
                echo "
\t\t";
            }
            // line 99
            echo "\" style=\"width:";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumbwidth");
            echo "px;height:";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumbheight");
            echo "px\" alt=\"\" />
\t</a>
\t";
        }
        // line 102
        echo "\t";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "postControls");
        echo "
\t<div class=\"body\">
\t\t";
    }

    // line 104
    public function block___internal_fbed9cec70ad48f04fce9d26807143be6e808a5c6e9c5de7e5439189098962ee($context, array $blocks = array())
    {
        // line 105
        echo "\t\t";
        if ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "ban message", array(), "array")) {
            // line 106
            echo "\t\t\t";
            echo sprintf($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "ban_message"), $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "ban message", array(), "array"));
            echo "
\t\t";
        }
        // line 108
        echo "\t</div>
</div>
<br/>
";
    }

    public function getTemplateName()
    {
        return "post_reply.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  403 => 108,  397 => 106,  394 => 105,  391 => 104,  383 => 102,  367 => 98,  360 => 96,  357 => 95,  351 => 93,  345 => 91,  343 => 90,  338 => 89,  336 => 88,  320 => 82,  305 => 78,  297 => 76,  295 => 75,  289 => 74,  285 => 72,  282 => 71,  279 => 70,  273 => 68,  265 => 66,  263 => 65,  260 => 64,  257 => 63,  248 => 60,  246 => 59,  239 => 58,  237 => 57,  228 => 54,  226 => 53,  217 => 51,  211 => 49,  205 => 47,  203 => 46,  197 => 43,  191 => 42,  176 => 38,  167 => 36,  156 => 34,  148 => 33,  140 => 31,  129 => 28,  123 => 26,  120 => 25,  116 => 23,  114 => 22,  111 => 21,  99 => 19,  97 => 18,  86 => 17,  75 => 13,  64 => 9,  62 => 8,  44 => 5,  38 => 3,  562 => 154,  559 => 152,  555 => 150,  550 => 149,  547 => 144,  544 => 143,  541 => 142,  535 => 140,  532 => 139,  529 => 134,  527 => 133,  524 => 132,  522 => 131,  519 => 130,  513 => 128,  510 => 127,  507 => 126,  498 => 123,  487 => 121,  484 => 120,  481 => 119,  475 => 117,  471 => 115,  468 => 114,  465 => 113,  462 => 112,  456 => 110,  452 => 108,  449 => 107,  446 => 106,  443 => 105,  437 => 103,  433 => 101,  430 => 100,  428 => 99,  423 => 97,  417 => 96,  410 => 95,  404 => 93,  402 => 92,  393 => 90,  374 => 99,  369 => 86,  366 => 85,  358 => 83,  355 => 82,  349 => 80,  346 => 79,  342 => 77,  340 => 76,  337 => 75,  325 => 73,  323 => 72,  309 => 70,  303 => 68,  301 => 67,  298 => 66,  292 => 64,  290 => 63,  288 => 62,  284 => 61,  278 => 60,  269 => 59,  261 => 57,  254 => 62,  247 => 54,  244 => 53,  238 => 51,  232 => 56,  230 => 48,  225 => 47,  223 => 46,  213 => 44,  209 => 42,  201 => 39,  194 => 38,  186 => 36,  184 => 41,  178 => 39,  174 => 32,  168 => 30,  162 => 28,  154 => 26,  152 => 25,  149 => 24,  143 => 32,  137 => 20,  135 => 19,  128 => 18,  126 => 17,  121 => 16,  115 => 14,  113 => 13,  102 => 11,  90 => 7,  88 => 6,  83 => 16,  80 => 3,  77 => 14,  72 => 12,  67 => 159,  35 => 1,  33 => 155,  26 => 104,  24 => 1,  398 => 296,  382 => 88,  326 => 86,  317 => 240,  312 => 79,  240 => 232,  185 => 163,  171 => 31,  169 => 100,  146 => 23,  136 => 79,  134 => 78,  132 => 29,  98 => 76,  96 => 9,  92 => 44,  84 => 43,  82 => 38,  73 => 37,  66 => 10,  58 => 7,  52 => 6,  22 => 28,);
    }
}
