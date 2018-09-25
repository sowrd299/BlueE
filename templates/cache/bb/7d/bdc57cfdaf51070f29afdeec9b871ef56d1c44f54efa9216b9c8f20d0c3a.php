<?php

/* header.html */
class __TwigTemplate_bb7dbdc57cfdaf51070f29afdeec9b871ef56d1c44f54efa9216b9c8f20d0c3a extends Twig_Template
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
        echo "\t\t<link rel=\"stylesheet\" media=\"screen\" href=\"";
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "url_stylesheet");
        echo "\">
\t\t";
        // line 2
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "url_favicon")) {
            echo "<link rel=\"shortcut icon\" href=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "url_favicon");
            echo "\">";
        }
        // line 3
        echo "\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=yes\">
\t\t";
        // line 5
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "meta_keywords")) {
            echo "<meta name=\"keywords\" content=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "meta_keywords");
            echo "\">";
        }
        // line 6
        echo "\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "default_stylesheet"), 1) != "")) {
            echo "<link rel=\"stylesheet\" type=\"text/css\" id=\"stylesheet\" href=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "uri_stylesheets");
            echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "default_stylesheet"), 1);
            echo "\">";
        }
        // line 7
        echo "\t\t";
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "font_awesome")) {
            echo "<link rel=\"stylesheet\" media=\"screen\" href=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "font_awesome_css");
            echo "\">";
        }
        // line 8
        echo "\t\t<script type=\"text/javascript\">var configRoot=\"";
        echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "root");
        echo "\";</script>
\t\t";
        // line 9
        if ((!(isset($context["nojavascript"]) ? $context["nojavascript"] : null))) {
            // line 10
            echo "\t\t\t<script type=\"text/javascript\" src=\"";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "url_javascript");
            echo "\"></script>
\t\t\t";
            // line 11
            if ((!$this->getAttribute((isset($context["config"]) ? $context["config"] : null), "additional_javascript_compile"))) {
                // line 12
                echo "\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "additional_javascript"));
                foreach ($context['_seq'] as $context["_key"] => $context["javascript"]) {
                    echo "<script type=\"text/javascript\" src=\"";
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "additional_javascript_url");
                    echo (isset($context["javascript"]) ? $context["javascript"] : null);
                    echo "\"></script>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['javascript'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "\t\t\t";
            }
            // line 14
            echo "\t\t";
        }
        // line 15
        echo "\t\t";
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "recaptcha")) {
            echo "<style type=\"text/css\">";
            // line 43
            echo "
\t\t\t#recaptcha_area {
\t\t\t\tfloat: none !important;
\t\t\t\tpadding: 0 !important;
\t\t\t}
\t\t\t#recaptcha_logo, #recaptcha_privacy {
\t\t\t\tdisplay: none;
\t\t\t}
\t\t\t#recaptcha_table {
\t\t\t\tborder: none !important;
\t\t\t}
\t\t\t#recaptcha_table tr:first-child {
\t\t\t\theight: auto;
\t\t\t}
\t\t\t.recaptchatable img {
\t\t\t\tfloat: none !important;
\t\t\t}
\t\t\t#recaptcha_response_field {
\t\t\t\tfont-size: 10pt !important;
\t\t\t\tborder: 1px solid #a9a9a9 !important;
\t\t\t\tpadding: 1px !important;
\t\t\t}
\t\t\ttd.recaptcha_image_cell {
\t\t\t\tbackground: transparent !important;
\t\t\t}
\t\t\t.recaptchatable, #recaptcha_area tr, #recaptcha_area td, #recaptcha_area th {
\t\t\t\tpadding: 0 !important;
\t\t\t}
\t\t";
            echo "</style>";
        }
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 14,  71 => 11,  59 => 8,  51 => 7,  43 => 6,  37 => 5,  27 => 2,  294 => 59,  277 => 53,  275 => 52,  241 => 50,  222 => 49,  215 => 45,  210 => 44,  206 => 43,  202 => 42,  198 => 41,  195 => 40,  189 => 39,  179 => 35,  165 => 34,  127 => 30,  124 => 29,  122 => 28,  117 => 25,  110 => 24,  107 => 23,  101 => 21,  95 => 19,  79 => 13,  56 => 12,  39 => 9,  30 => 6,  28 => 5,  403 => 108,  397 => 106,  394 => 105,  391 => 104,  383 => 102,  367 => 98,  360 => 96,  357 => 95,  351 => 93,  345 => 91,  343 => 90,  338 => 89,  336 => 88,  320 => 82,  305 => 78,  297 => 76,  295 => 75,  289 => 57,  285 => 55,  282 => 71,  279 => 70,  273 => 68,  265 => 66,  263 => 65,  260 => 64,  257 => 51,  248 => 60,  246 => 59,  239 => 58,  237 => 57,  228 => 54,  226 => 53,  217 => 46,  211 => 49,  205 => 47,  203 => 46,  197 => 43,  191 => 42,  176 => 38,  167 => 36,  156 => 34,  148 => 33,  140 => 31,  129 => 31,  123 => 26,  120 => 25,  116 => 23,  114 => 22,  111 => 21,  99 => 19,  97 => 18,  86 => 13,  75 => 13,  64 => 9,  62 => 8,  44 => 11,  38 => 3,  562 => 154,  559 => 152,  555 => 150,  550 => 149,  547 => 144,  544 => 143,  541 => 142,  535 => 140,  532 => 139,  529 => 134,  527 => 133,  524 => 132,  522 => 131,  519 => 130,  513 => 128,  510 => 127,  507 => 126,  498 => 123,  487 => 121,  484 => 120,  481 => 119,  475 => 117,  471 => 115,  468 => 114,  465 => 113,  462 => 112,  456 => 110,  452 => 108,  449 => 107,  446 => 106,  443 => 105,  437 => 103,  433 => 101,  430 => 100,  428 => 99,  423 => 97,  417 => 96,  410 => 95,  404 => 93,  402 => 92,  393 => 90,  374 => 99,  369 => 86,  366 => 85,  358 => 83,  355 => 82,  349 => 80,  346 => 79,  342 => 77,  340 => 76,  337 => 75,  325 => 73,  323 => 72,  309 => 61,  303 => 68,  301 => 67,  298 => 60,  292 => 64,  290 => 63,  288 => 62,  284 => 61,  278 => 60,  269 => 59,  261 => 57,  254 => 62,  247 => 54,  244 => 53,  238 => 51,  232 => 56,  230 => 48,  225 => 47,  223 => 46,  213 => 44,  209 => 42,  201 => 39,  194 => 38,  186 => 38,  184 => 41,  178 => 39,  174 => 32,  168 => 30,  162 => 28,  154 => 26,  152 => 25,  149 => 33,  143 => 32,  137 => 20,  135 => 19,  128 => 18,  126 => 17,  121 => 16,  115 => 14,  113 => 13,  102 => 11,  90 => 17,  88 => 6,  83 => 15,  80 => 3,  77 => 14,  72 => 12,  67 => 159,  35 => 1,  33 => 3,  26 => 104,  24 => 1,  398 => 296,  382 => 88,  326 => 86,  317 => 240,  312 => 64,  240 => 232,  185 => 163,  171 => 31,  169 => 100,  146 => 23,  136 => 79,  134 => 78,  132 => 32,  98 => 76,  96 => 43,  92 => 15,  84 => 43,  82 => 38,  73 => 12,  66 => 10,  58 => 7,  52 => 6,  22 => 1,);
    }
}
