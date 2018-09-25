<?php

/* post_thread.html */
class __TwigTemplate_b4c96759513bd195ec1c6a6c83c1bd766d8f35d01995bdc07f5eeb222be3944b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_415e3bf334ac285c637a133b7a06eaed03fe3d4dcfe422ca26c10b967e54261e' => array($this, 'block___internal_415e3bf334ac285c637a133b7a06eaed03fe3d4dcfe422ca26c10b967e54261e'),
            '__internal_54014466930d82f7bb4029b5f81e88ff9dc5d9473c6106cfc6731f1a4d7823e5' => array($this, 'block___internal_54014466930d82f7bb4029b5f81e88ff9dc5d9473c6106cfc6731f1a4d7823e5'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo twig_remove_whitespace_filter((string) $this->renderBlock("__internal_415e3bf334ac285c637a133b7a06eaed03fe3d4dcfe422ca26c10b967e54261e", $context, $blocks));
        // line 126
        if ((isset($context["index"]) ? $context["index"] : null)) {
            echo truncate($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link"));
        } else {
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body");
        }
        echo twig_remove_whitespace_filter((string) $this->renderBlock("__internal_54014466930d82f7bb4029b5f81e88ff9dc5d9473c6106cfc6731f1a4d7823e5", $context, $blocks));
        // line 155
        $context["hr"] = $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "hr");
        // line 156
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "posts"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 157
            echo "\t";
            $this->env->loadTemplate("post_reply.html")->display($context);
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 159
        echo "<br class=\"clear\"/>";
        if ((isset($context["hr"]) ? $context["hr"] : null)) {
            echo "<hr/>";
        }
        // line 160
        echo "</div>
";
    }

    // line 1
    public function block___internal_415e3bf334ac285c637a133b7a06eaed03fe3d4dcfe422ca26c10b967e54261e($context, array $blocks = array())
    {
        // line 3
        echo "
<div id=\"thread_";
        // line 4
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\">

";
        // line 6
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "embed")) {
            // line 7
            echo "\t";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "embed");
            echo "
";
        } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file") == "deleted")) {
            // line 9
            echo "\t<img class=\"post-image deleted\" src=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_deleted");
            echo "\" alt=\"\" />
";
        } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file"))) {
            // line 11
            echo "\t<p class=\"fileinfo\">";
            echo gettext("File:");
            echo " <a href=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
            echo "\">";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
            echo "</a> <span class=\"unimportant\">
\t(
\t\t";
            // line 13
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "spoiler")) {
                // line 14
                echo "\t\t\t";
                echo gettext("Spoiler Image");
                echo ", 
\t\t";
            }
            // line 16
            echo "\t\t";
            echo format_bytes($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filesize"));
            echo "
\t\t";
            // line 17
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filewidth") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "fileheight"))) {
                // line 18
                echo "\t\t\t, ";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filewidth");
                echo "x";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "fileheight");
                echo "
\t\t\t";
                // line 19
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "show_ratio")) {
                    // line 20
                    echo "\t\t\t\t, ";
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ratio");
                    echo "
\t\t\t";
                }
                // line 22
                echo "\t\t";
            }
            // line 23
            echo "\t\t";
            if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "show_filename") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename"))) {
                // line 24
                echo "\t\t\t, 
\t\t\t";
                // line 25
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")) > $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_filename_display"))) {
                    // line 26
                    echo "\t\t\t\t<span class=\"postfilename\" title=\"";
                    echo bidi_cleanup(twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")));
                    echo "\">";
                    echo bidi_cleanup(twig_escape_filter($this->env, twig_filename_truncate_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "max_filename_display"))));
                    echo "</span>
\t\t\t";
                } else {
                    // line 28
                    echo "\t\t\t\t<span class=\"postfilename\">";
                    echo bidi_cleanup(twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")));
                    echo "</span>
\t\t\t";
                }
                // line 30
                echo "\t\t";
            }
            // line 31
            echo "\t\t";
            if ((($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") != "file") && $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_identification"))) {
                // line 32
                echo "\t\t\t, 
\t\t\t<span class='image_id'>
\t\t\t <a href=\"http://imgops.com/";
                // line 34
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                echo "\">io</a>
\t\t\t";
                // line 35
                if ((twig_extension_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file")) == "jpg")) {
                    // line 36
                    echo "\t\t\t\t <a href=\"http://regex.info/exif.cgi?url=";
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                    echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                    echo "\">e</a>
\t\t\t";
                }
                // line 38
                echo "\t\t\t <a href=\"http://www.google.com/searchbyimage?image_url=";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                echo "\">g</a>
\t\t\t <a href=\"http://www.tineye.com/search?url=";
                // line 39
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "domain");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
                echo "\">t</a>
\t\t\t</span>
\t\t";
            }
            // line 42
            echo "\t)
\t</span></p>
<a href=\"";
            // line 44
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_img");
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "file");
            echo "\" target=\"_blank\"";
            if ((($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "file") || ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "is_file", array(), "array") == "1"))) {
                echo " class=\"file\"";
            }
            echo ">
<img class=\"post-image\" src=\"
\t";
            // line 46
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "file")) {
                // line 47
                echo "\t\t";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
                echo "
\t\t";
                // line 48
                if ($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_icons"), twig_extension_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")), array(), "array")) {
                    // line 49
                    echo "\t\t\t";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_thumb"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_icons"), twig_extension_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "filename")), array(), "array"));
                    echo "
\t\t";
                } else {
                    // line 51
                    echo "\t\t\t";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_thumb"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_icons"), "default"));
                    echo "
\t\t";
                }
                // line 53
                echo "\t";
            } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb") == "spoiler")) {
                // line 54
                echo "\t\t";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "spoiler_image");
                echo "
\t";
            } else {
                // line 56
                echo "\t\t";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_thumb");
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumb");
                echo "
\t";
            }
            // line 57
            echo "\" style=\"width:";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumbwidth");
            echo "px;height:";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "thumbheight");
            echo "px\" alt=\"\" /></a>
";
        }
        // line 59
        echo "<div class=\"post op\"><p class=\"intro\"";
        if ((!(isset($context["index"]) ? $context["index"] : null))) {
            echo " id=\"";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
            echo "\"";
        }
        echo ">
\t<input type=\"checkbox\" class=\"delete\" name=\"delete_";
        // line 60
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\" id=\"delete_";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\" />
\t<label for=\"delete_";
        // line 61
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "\">
\t\t";
        // line 62
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject")) > 0)) {
            // line 63
            echo "\t\t\t";
            // line 64
            echo "\t\t\t<span class=\"subject\">";
            echo bidi_cleanup($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject"));
            echo "</span> 
\t\t";
        }
        // line 66
        echo "\t\t";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email")) > 0)) {
            // line 67
            echo "\t\t\t";
            // line 68
            echo "\t\t\t<a class=\"email\" href=\"mailto:";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email");
            echo "\">
\t\t";
        }
        // line 70
        echo "\t\t";
        $context["capcode"] = capcode($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "capcode"));
        // line 71
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
        // line 72
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "trip")) > 0)) {
            // line 73
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
        // line 75
        echo "\t\t";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email")) > 0)) {
            // line 76
            echo "\t\t\t";
            // line 77
            echo "\t\t\t</a>
\t\t";
        }
        // line 79
        echo "\t\t";
        if ((isset($context["capcode"]) ? $context["capcode"] : null)) {
            // line 80
            echo "\t\t\t";
            echo $this->getAttribute((isset($context["capcode"]) ? $context["capcode"] : null), "cap");
            echo "
\t\t";
        }
        // line 82
        echo "\t\t";
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod") && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "show_ip"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri")))) {
            // line 83
            echo "\t\t\t [<a class=\"ip-link\" style=\"margin:0;\" href=\"?/IP/";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip");
            echo "\">";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip");
            echo "</a>]
\t\t";
        }
        // line 85
        echo "\t\t";
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "display_flags") && $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag"))) {
            // line 86
            echo "\t\t\t <img class=\"flag\" src=\"";
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_flags"), $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag"));
            echo "\"
\t\t\t \tstyle=\"";
            // line 87
            if ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag style", array(), "array")) {
                echo $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "flag style", array(), "array");
            } else {
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "flag_style");
            }
            echo "\"
\t\t\t ";
            // line 88
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
        // line 90
        echo "\t\t <time datetime=\"";
        echo twig_date_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"), "%Y-%m-%dT%H:%M:%S");
        echo twig_timezone_function();
        echo "\">";
        echo twig_date_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
        echo "</time>
\t</label>
\t";
        // line 92
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "poster_ids")) {
            // line 93
            echo "\t\t ID: ";
            echo poster_id($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "ip"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id"));
            echo "
\t";
        }
        // line 95
        echo "         <a class=\"post_no\" onclick=\"return document.querySelectorAll('div.banner').length ? highlightReply(";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo ") : true;\" href=\"";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link");
        echo "\">No.</a>
        <a class=\"post_no\" onclick=\"return document.querySelectorAll('div.banner').length ? citeReply(";
        // line 96
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo ") : true;\" href=\"";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link", array(0 => "q"), "method");
        echo "\">
                ";
        // line 97
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
        echo "
        </a>
\t";
        // line 99
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "sticky")) {
            // line 100
            echo "\t\t";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "font_awesome")) {
                // line 101
                echo "\t\t\t<i class=\"fa fa-thumb-tack\"></i>
\t\t";
            } else {
                // line 103
                echo "\t\t\t<img class=\"icon\" title=\"Sticky\" src=\"";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_sticky");
                echo "\" alt=\"Sticky\" />
\t\t";
            }
            // line 105
            echo "\t";
        }
        // line 106
        echo "\t";
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "locked")) {
            // line 107
            echo "\t\t";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "font_awesome")) {
                // line 108
                echo "\t\t\t<i class=\"fa fa-lock\"></i>
\t\t";
            } else {
                // line 110
                echo "\t\t\t<img class=\"icon\" title=\"Locked\" src=\"";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_locked");
                echo "\" alt=\"Locked\" />
\t\t";
            }
            // line 112
            echo "\t";
        }
        // line 113
        echo "\t";
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "bumplocked") && (($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_bumplock") < 0) || ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod") && twig_hasPermission_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "mod"), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_bumplock"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri")))))) {
            // line 114
            echo "\t\t";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "font_awesome")) {
                // line 115
                echo "\t\t\t<i class=\"fa fa-anchor\"></i>
\t\t";
            } else {
                // line 117
                echo "\t\t\t<img class=\"icon\" title=\"Bumplocked\" src=\"";
                echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "image_bumplocked");
                echo "\" alt=\"Bumplocked\" />
\t\t";
            }
            // line 119
            echo "\t";
        }
        // line 120
        echo "\t";
        if ((isset($context["index"]) ? $context["index"] : null)) {
            // line 121
            echo "\t\t<a href=\"";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "root");
            echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "dir");
            echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "dir"), "res");
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "file_page"), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id"));
            echo "\">[";
            echo gettext("Reply");
            echo "]</a>
\t";
        }
        // line 123
        echo "\t";
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "postControls");
        echo "
\t</p>
\t<div class=\"body\">
\t\t";
    }

    // line 126
    public function block___internal_54014466930d82f7bb4029b5f81e88ff9dc5d9473c6106cfc6731f1a4d7823e5($context, array $blocks = array())
    {
        // line 127
        echo "\t\t";
        if ($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "ban message", array(), "array")) {
            // line 128
            echo "\t\t\t";
            echo sprintf($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "ban_message"), $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "modifiers"), "ban message", array(), "array"));
            echo "
\t\t";
        }
        // line 130
        echo "\t</div>
\t";
        // line 131
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted") || $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted_images"))) {
            // line 132
            echo "\t\t<span class=\"omitted\">
\t\t\t";
            // line 133
            if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted")) {
                // line 134
                echo "\t\t\t\t";
                echo strtr(ngettext("1 post", "%count% posts", abs($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted"))), array("%count%" => abs($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted")), ));
                // line 139
                echo "\t\t\t\t";
                if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted_images")) {
                    // line 140
                    echo "\t\t\t\t\t ";
                    echo gettext("and");
                    echo " 
\t\t\t\t";
                }
                // line 142
                echo "\t\t\t";
            }
            // line 143
            echo "\t\t\t";
            if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted_images")) {
                // line 144
                echo "\t\t\t\t";
                echo strtr(ngettext("1 image reply", "%count% image replies", abs($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted_images"))), array("%count%" => abs($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "omitted_images")), ));
                // line 149
                echo "\t\t\t";
            }
            echo " ";
            echo gettext("omitted. Click reply to view.");
            // line 150
            echo "\t\t</span>
\t";
        }
        // line 152
        if ((!(isset($context["index"]) ? $context["index"] : null))) {
        }
        // line 154
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "post_thread.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  562 => 154,  559 => 152,  555 => 150,  550 => 149,  547 => 144,  544 => 143,  541 => 142,  535 => 140,  532 => 139,  529 => 134,  527 => 133,  524 => 132,  522 => 131,  519 => 130,  513 => 128,  510 => 127,  507 => 126,  498 => 123,  487 => 121,  484 => 120,  481 => 119,  475 => 117,  471 => 115,  468 => 114,  465 => 113,  462 => 112,  456 => 110,  452 => 108,  449 => 107,  446 => 106,  443 => 105,  437 => 103,  433 => 101,  430 => 100,  428 => 99,  423 => 97,  417 => 96,  410 => 95,  404 => 93,  402 => 92,  393 => 90,  374 => 87,  369 => 86,  366 => 85,  358 => 83,  355 => 82,  349 => 80,  346 => 79,  342 => 77,  340 => 76,  337 => 75,  325 => 73,  323 => 72,  309 => 70,  303 => 68,  301 => 67,  298 => 66,  292 => 64,  290 => 63,  288 => 62,  284 => 61,  278 => 60,  269 => 59,  261 => 57,  254 => 56,  247 => 54,  244 => 53,  238 => 51,  232 => 49,  230 => 48,  225 => 47,  223 => 46,  213 => 44,  209 => 42,  201 => 39,  194 => 38,  186 => 36,  184 => 35,  178 => 34,  174 => 32,  168 => 30,  162 => 28,  154 => 26,  152 => 25,  149 => 24,  143 => 22,  137 => 20,  135 => 19,  128 => 18,  126 => 17,  121 => 16,  115 => 14,  113 => 13,  102 => 11,  90 => 7,  88 => 6,  83 => 4,  80 => 3,  77 => 1,  72 => 160,  67 => 159,  35 => 156,  33 => 155,  26 => 126,  24 => 1,  398 => 296,  382 => 88,  326 => 293,  317 => 240,  312 => 71,  240 => 232,  185 => 163,  171 => 31,  169 => 100,  146 => 23,  136 => 79,  134 => 78,  132 => 77,  98 => 76,  96 => 9,  92 => 44,  84 => 43,  82 => 38,  73 => 37,  66 => 32,  58 => 31,  52 => 157,  22 => 28,);
    }
}
