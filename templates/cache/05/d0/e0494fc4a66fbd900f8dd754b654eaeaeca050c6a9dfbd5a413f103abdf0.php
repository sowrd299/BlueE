<?php

/* index.html */
class __TwigTemplate_05d0e0494fc4a66fbd900f8dd754b654eaeaeca050c6a9dfbd5a413f103abdf0 extends Twig_Template
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
        echo "<!doctype html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t";
        // line 5
        $this->env->loadTemplate("header.html")->display($context);
        // line 6
        echo "\t<title>";
        echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "url");
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "title"));
        echo "</title>
</head>
<body>\t
\t";
        // line 9
        echo $this->getAttribute((isset($context["boardlist"]) ? $context["boardlist"] : null), "top");
        echo "
\t
\t";
        // line 11
        if ((isset($context["pm"]) ? $context["pm"] : null)) {
            echo "<div class=\"top_notice\">You have <a href=\"?/PM/";
            echo $this->getAttribute((isset($context["pm"]) ? $context["pm"] : null), "id");
            echo "\">an unread PM</a>";
            if (($this->getAttribute((isset($context["pm"]) ? $context["pm"] : null), "waiting") > 0)) {
                echo ", plus ";
                echo $this->getAttribute((isset($context["pm"]) ? $context["pm"] : null), "waiting");
                echo " more waiting";
            }
            echo ".</div><hr />";
        }
        // line 12
        echo "\t";
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "url_banner")) {
            echo "<img class=\"banner\" src=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "url_banner");
            echo "\" ";
            if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "banner_width") || $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "banner_height"))) {
                echo "style=\"";
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "banner_width")) {
                    echo "width:";
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "banner_width");
                    echo "px";
                }
                echo ";";
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "banner_width")) {
                    echo "height:";
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "banner_height");
                    echo "px";
                }
                echo "\" ";
            }
            echo "alt=\"\" />";
        }
        // line 13
        echo "\t
\t<header>
\t\t<h1>";
        // line 15
        echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "url");
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "title"));
        echo "</h1>
\t\t<div class=\"subtitle\">
\t\t\t";
        // line 17
        if ($this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle")) {
            // line 18
            echo "\t\t\t\t";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "allow_subtitle_html")) {
                // line 19
                echo "\t\t\t\t\t";
                echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle");
                echo "
\t\t\t\t";
            } else {
                // line 21
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle"));
                echo "
\t\t\t\t";
            }
            // line 23
            echo "\t\t\t";
        }
        // line 24
        echo "\t\t\t";
        if ((isset($context["mod"]) ? $context["mod"] : null)) {
            echo "<p><a href=\"?/\">";
            echo gettext("Return to dashboard");
            echo "</a></p>";
        }
        // line 25
        echo "\t\t</div>
\t</header>
\t
\t";
        // line 28
        $this->env->loadTemplate("post_form.html")->display($context);
        // line 29
        echo "\t
\t";
        // line 30
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "page_nav_top")) {
            // line 31
            echo "\t\t<div class=\"pages top\">
\t\t\t";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pages"]) ? $context["pages"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 33
                echo "\t\t\t [<a ";
                if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "selected")) {
                    echo "class=\"selected\"";
                }
                if ((!$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "selected"))) {
                    echo "href=\"";
                    echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "link");
                    echo "\"";
                }
                echo ">";
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "num");
                echo "</a>]";
                if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                    echo " ";
                }
                // line 34
                echo "\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t";
            echo $this->getAttribute((isset($context["btn"]) ? $context["btn"] : null), "next");
            echo "
\t\t</div>
\t";
        }
        // line 38
        echo "\t
\t";
        // line 39
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "global_message")) {
            echo "<hr /><div class=\"blotter\">";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "global_message");
            echo "</div>";
        }
        // line 40
        echo "\t<hr />
\t<form name=\"postcontrols\" action=\"";
        // line 41
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_url");
        echo "\" method=\"post\">
\t<input type=\"hidden\" name=\"board\" value=\"";
        // line 42
        echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri");
        echo "\" />
\t";
        // line 43
        if ((isset($context["mod"]) ? $context["mod"] : null)) {
            echo "<input type=\"hidden\" name=\"mod\" value=\"1\" />";
        }
        // line 44
        echo "\t";
        echo (isset($context["body"]) ? $context["body"] : null);
        echo "
\t";
        // line 45
        $this->env->loadTemplate("report_delete.html")->display($context);
        // line 46
        echo "\t</form>
\t
\t<div class=\"pages\">
\t\t";
        // line 49
        echo $this->getAttribute((isset($context["btn"]) ? $context["btn"] : null), "prev");
        echo " ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pages"]) ? $context["pages"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 50
            echo "\t\t [<a ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "selected")) {
                echo "class=\"selected\"";
            }
            if ((!$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "selected"))) {
                echo "href=\"";
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "link");
                echo "\"";
            }
            echo ">";
            echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "num");
            echo "</a>]";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                echo " ";
            }
            // line 51
            echo "\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " ";
        echo $this->getAttribute((isset($context["btn"]) ? $context["btn"] : null), "next");
        echo "
\t\t";
        // line 52
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "catalog_link")) {
            // line 53
            echo "\t\t\t | <a href=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
            echo $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "dir");
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "catalog_link");
            echo "\">Catalog</a>
\t\t";
        }
        // line 55
        echo "\t</div>
\t
\t";
        // line 57
        echo $this->getAttribute((isset($context["boardlist"]) ? $context["boardlist"] : null), "bottom");
        echo "
\t<footer>
\t\t<p class=\"unimportant\" style=\"margin-top:20px;text-align:center;\">Powered by <a href=\"http://tinyboard.org/\">Tinyboard</a> ";
        // line 59
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "version");
        echo " | <a href=\"http://tinyboard.org/\">Tinyboard</a> Copyright &copy; 2010-2014 Tinyboard Development Group</p>
\t\t";
        // line 60
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "footer"));
        foreach ($context['_seq'] as $context["_key"] => $context["footer"]) {
            echo "<p class=\"unimportant\" style=\"text-align:center;\">";
            echo (isset($context["footer"]) ? $context["footer"] : null);
            echo "</p>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "\t</footer>
\t<script type=\"text/javascript\">";
        // line 64
        echo "
\t\tready();
\t";
        echo "</script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  294 => 59,  277 => 53,  275 => 52,  241 => 50,  222 => 49,  215 => 45,  210 => 44,  206 => 43,  202 => 42,  198 => 41,  195 => 40,  189 => 39,  179 => 35,  165 => 34,  127 => 30,  124 => 29,  122 => 28,  117 => 25,  110 => 24,  107 => 23,  101 => 21,  95 => 19,  79 => 13,  56 => 12,  39 => 9,  30 => 6,  28 => 5,  403 => 108,  397 => 106,  394 => 105,  391 => 104,  383 => 102,  367 => 98,  360 => 96,  357 => 95,  351 => 93,  345 => 91,  343 => 90,  338 => 89,  336 => 88,  320 => 82,  305 => 78,  297 => 76,  295 => 75,  289 => 57,  285 => 55,  282 => 71,  279 => 70,  273 => 68,  265 => 66,  263 => 65,  260 => 64,  257 => 51,  248 => 60,  246 => 59,  239 => 58,  237 => 57,  228 => 54,  226 => 53,  217 => 46,  211 => 49,  205 => 47,  203 => 46,  197 => 43,  191 => 42,  176 => 38,  167 => 36,  156 => 34,  148 => 33,  140 => 31,  129 => 31,  123 => 26,  120 => 25,  116 => 23,  114 => 22,  111 => 21,  99 => 19,  97 => 18,  86 => 17,  75 => 13,  64 => 9,  62 => 8,  44 => 11,  38 => 3,  562 => 154,  559 => 152,  555 => 150,  550 => 149,  547 => 144,  544 => 143,  541 => 142,  535 => 140,  532 => 139,  529 => 134,  527 => 133,  524 => 132,  522 => 131,  519 => 130,  513 => 128,  510 => 127,  507 => 126,  498 => 123,  487 => 121,  484 => 120,  481 => 119,  475 => 117,  471 => 115,  468 => 114,  465 => 113,  462 => 112,  456 => 110,  452 => 108,  449 => 107,  446 => 106,  443 => 105,  437 => 103,  433 => 101,  430 => 100,  428 => 99,  423 => 97,  417 => 96,  410 => 95,  404 => 93,  402 => 92,  393 => 90,  374 => 99,  369 => 86,  366 => 85,  358 => 83,  355 => 82,  349 => 80,  346 => 79,  342 => 77,  340 => 76,  337 => 75,  325 => 73,  323 => 72,  309 => 61,  303 => 68,  301 => 67,  298 => 60,  292 => 64,  290 => 63,  288 => 62,  284 => 61,  278 => 60,  269 => 59,  261 => 57,  254 => 62,  247 => 54,  244 => 53,  238 => 51,  232 => 56,  230 => 48,  225 => 47,  223 => 46,  213 => 44,  209 => 42,  201 => 39,  194 => 38,  186 => 38,  184 => 41,  178 => 39,  174 => 32,  168 => 30,  162 => 28,  154 => 26,  152 => 25,  149 => 33,  143 => 32,  137 => 20,  135 => 19,  128 => 18,  126 => 17,  121 => 16,  115 => 14,  113 => 13,  102 => 11,  90 => 17,  88 => 6,  83 => 15,  80 => 3,  77 => 14,  72 => 12,  67 => 159,  35 => 1,  33 => 155,  26 => 104,  24 => 1,  398 => 296,  382 => 88,  326 => 86,  317 => 240,  312 => 64,  240 => 232,  185 => 163,  171 => 31,  169 => 100,  146 => 23,  136 => 79,  134 => 78,  132 => 32,  98 => 76,  96 => 9,  92 => 18,  84 => 43,  82 => 38,  73 => 37,  66 => 10,  58 => 7,  52 => 6,  22 => 1,);
    }
}
