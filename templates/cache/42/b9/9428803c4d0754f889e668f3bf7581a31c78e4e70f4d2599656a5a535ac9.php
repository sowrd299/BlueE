<?php

/* mod/search_form.html */
class __TwigTemplate_42b99428803c4d0754f889e668f3bf7581a31c78e4e70f4d2599656a5a535ac9 extends Twig_Template
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
        echo "<form style=\"display:inline\" action=\"?/search\" method=\"post\">
\t<label style=\"display:inline\" for=\"search\">";
        // line 2
        echo gettext("Phrase:");
        echo "</label> 
\t<input id=\"search\" name=\"query\" type=\"text\" size=\"60\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["search_query"]) ? $context["search_query"] : null));
        echo "\">
\t<select name=\"type\">
\t\t<option value=\"posts\"";
        // line 5
        if (((isset($context["search_type"]) ? $context["search_type"] : null) == "posts")) {
            echo " selected";
        }
        echo ">";
        echo gettext("Posts");
        echo "</option>
\t\t";
        // line 6
        if ((twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_notes")) && twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "show_ip")))) {
            // line 7
            echo "\t\t\t<option value=\"IP_notes\"";
            if (((isset($context["search_type"]) ? $context["search_type"] : null) == "IP_notes")) {
                echo " selected";
            }
            echo ">";
            echo gettext("IP address notes");
            echo "</option>
\t\t";
        }
        // line 9
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "view_banlist"))) {
            // line 10
            echo "\t\t\t<option value=\"bans\"";
            if (((isset($context["search_type"]) ? $context["search_type"] : null) == "bans")) {
                echo " selected";
            }
            echo ">";
            echo gettext("Bans");
            echo "</option>
\t\t";
        }
        // line 12
        echo "\t\t";
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "modlog"))) {
            // line 13
            echo "\t\t\t<option value=\"log\"";
            if (((isset($context["search_type"]) ? $context["search_type"] : null) == "log")) {
                echo " selected";
            }
            echo ">";
            echo gettext("Moderation log");
            echo "</option>
\t\t";
        }
        // line 15
        echo "\t</select>
\t<input type=\"submit\" value=\"";
        // line 16
        echo gettext("Search");
        echo "\">
</form>
<p class=\"unimportant\">";
        // line 18
        echo gettext("(Search is case-insensitive and based on keywords. To match exact phrases, use \"quotes\". Use an asterisk (*) for wildcard.)");
        echo "</p>";
    }

    public function getTemplateName()
    {
        return "mod/search_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 18,  83 => 16,  80 => 15,  70 => 13,  67 => 12,  54 => 9,  44 => 7,  42 => 6,  34 => 5,  29 => 3,  452 => 167,  446 => 164,  442 => 162,  429 => 156,  422 => 151,  420 => 150,  417 => 149,  412 => 146,  406 => 144,  404 => 143,  400 => 142,  396 => 141,  391 => 139,  388 => 138,  386 => 137,  383 => 136,  378 => 133,  367 => 131,  363 => 130,  357 => 127,  354 => 126,  352 => 125,  349 => 124,  343 => 120,  341 => 119,  334 => 115,  331 => 114,  329 => 113,  323 => 109,  317 => 107,  314 => 106,  308 => 104,  305 => 103,  299 => 101,  296 => 100,  290 => 98,  287 => 97,  279 => 95,  273 => 93,  270 => 92,  264 => 90,  261 => 89,  255 => 87,  252 => 86,  248 => 84,  244 => 83,  237 => 82,  233 => 81,  230 => 80,  228 => 79,  222 => 76,  214 => 70,  204 => 69,  200 => 68,  193 => 65,  187 => 63,  182 => 60,  172 => 56,  168 => 54,  164 => 53,  158 => 51,  156 => 50,  151 => 47,  145 => 45,  139 => 43,  137 => 42,  133 => 41,  130 => 40,  126 => 39,  121 => 37,  118 => 36,  115 => 35,  113 => 34,  108 => 32,  102 => 28,  96 => 26,  94 => 25,  91 => 24,  84 => 22,  76 => 20,  73 => 19,  69 => 17,  63 => 15,  57 => 10,  55 => 12,  52 => 11,  50 => 10,  46 => 9,  38 => 7,  35 => 6,  31 => 5,  25 => 2,  22 => 1,);
    }
}
