<?php

/* mod/rebuilt.html */
class __TwigTemplate_3ce79b8c43d036bede6f782909e07833807e1a90c7b78acd336cfbe9cafe0be6 extends Twig_Template
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
        echo "<div class=\"ban\">
\t<h2>";
        // line 2
        echo gettext("Rebuilt");
        echo "</h2>
\t<ul>
\t\t";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 5
            echo "\t\t\t<li>";
            echo (isset($context["log"]) ? $context["log"] : null);
            echo "</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "\t</ul>
\t<p>
\t\t<a href=\"?/rebuild\">";
        // line 9
        echo gettext("Go back and rebuild again");
        echo "</a>.
\t</p>
</div>

";
    }

    public function getTemplateName()
    {
        return "mod/rebuilt.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  196 => 44,  166 => 37,  164 => 36,  155 => 34,  147 => 32,  144 => 31,  133 => 28,  119 => 23,  112 => 22,  109 => 21,  103 => 19,  94 => 16,  47 => 9,  42 => 8,  36 => 5,  29 => 3,  25 => 2,  341 => 131,  332 => 127,  328 => 126,  318 => 121,  307 => 116,  302 => 114,  293 => 112,  274 => 106,  270 => 105,  266 => 104,  262 => 102,  256 => 99,  253 => 98,  236 => 89,  216 => 79,  212 => 77,  199 => 47,  192 => 66,  188 => 65,  181 => 42,  175 => 59,  173 => 58,  159 => 35,  157 => 50,  151 => 33,  138 => 30,  130 => 41,  125 => 39,  93 => 25,  91 => 24,  85 => 13,  69 => 14,  61 => 11,  57 => 10,  49 => 7,  45 => 6,  41 => 5,  31 => 3,  89 => 14,  71 => 15,  59 => 11,  51 => 8,  43 => 7,  37 => 4,  27 => 2,  294 => 59,  277 => 53,  275 => 52,  241 => 50,  222 => 49,  215 => 45,  210 => 76,  206 => 43,  202 => 42,  198 => 41,  195 => 40,  189 => 39,  179 => 61,  165 => 34,  127 => 30,  124 => 26,  122 => 28,  117 => 25,  110 => 33,  107 => 32,  101 => 29,  95 => 19,  79 => 19,  56 => 12,  39 => 9,  30 => 4,  28 => 5,  403 => 108,  397 => 106,  394 => 105,  391 => 104,  383 => 102,  367 => 98,  360 => 96,  357 => 95,  351 => 137,  345 => 132,  343 => 90,  338 => 130,  336 => 88,  320 => 122,  305 => 78,  297 => 76,  295 => 75,  289 => 57,  285 => 55,  282 => 71,  279 => 108,  273 => 68,  265 => 66,  263 => 65,  260 => 101,  257 => 51,  248 => 60,  246 => 94,  239 => 58,  237 => 57,  228 => 54,  226 => 53,  217 => 46,  211 => 49,  205 => 73,  203 => 72,  197 => 43,  191 => 42,  176 => 40,  167 => 55,  156 => 34,  148 => 33,  140 => 31,  129 => 31,  123 => 26,  120 => 25,  116 => 35,  114 => 34,  111 => 21,  99 => 19,  97 => 17,  86 => 13,  75 => 13,  64 => 12,  62 => 8,  44 => 11,  38 => 3,  562 => 154,  559 => 152,  555 => 150,  550 => 149,  547 => 144,  544 => 143,  541 => 142,  535 => 140,  532 => 139,  529 => 134,  527 => 133,  524 => 132,  522 => 131,  519 => 130,  513 => 128,  510 => 127,  507 => 126,  498 => 123,  487 => 121,  484 => 120,  481 => 119,  475 => 117,  471 => 115,  468 => 114,  465 => 113,  462 => 112,  456 => 110,  452 => 108,  449 => 107,  446 => 106,  443 => 105,  437 => 103,  433 => 101,  430 => 100,  428 => 99,  423 => 97,  417 => 96,  410 => 95,  404 => 93,  402 => 92,  393 => 90,  374 => 99,  369 => 86,  366 => 85,  358 => 83,  355 => 82,  349 => 80,  346 => 79,  342 => 77,  340 => 76,  337 => 75,  325 => 73,  323 => 72,  309 => 61,  303 => 68,  301 => 67,  298 => 113,  292 => 64,  290 => 63,  288 => 110,  284 => 109,  278 => 60,  269 => 59,  261 => 57,  254 => 62,  247 => 54,  244 => 53,  238 => 90,  232 => 87,  230 => 86,  225 => 47,  223 => 83,  213 => 44,  209 => 42,  201 => 39,  194 => 38,  186 => 38,  184 => 41,  178 => 39,  174 => 32,  168 => 30,  162 => 28,  154 => 26,  152 => 25,  149 => 33,  143 => 32,  137 => 20,  135 => 29,  128 => 40,  126 => 17,  121 => 16,  115 => 14,  113 => 13,  102 => 11,  90 => 17,  88 => 6,  83 => 15,  80 => 3,  77 => 14,  72 => 12,  67 => 159,  35 => 1,  33 => 3,  26 => 104,  24 => 1,  398 => 296,  382 => 88,  326 => 86,  317 => 240,  312 => 119,  240 => 232,  185 => 43,  171 => 31,  169 => 38,  146 => 23,  136 => 79,  134 => 78,  132 => 32,  98 => 76,  96 => 43,  92 => 15,  84 => 43,  82 => 12,  73 => 12,  66 => 10,  58 => 7,  52 => 6,  22 => 1,);
    }
}