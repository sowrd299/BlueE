<?php

/* mod/board.html */
class __TwigTemplate_5f8d003e7fa78f0dc2a8b5dbeaffcf44d56b6883bf4701155b9c16e5df92e8b0 extends Twig_Template
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
        if ((isset($context["new"]) ? $context["new"] : null)) {
            // line 2
            echo "\t";
            $context["action"] = "?/new-board";
        } else {
            // line 4
            echo "\t";
            $context["action"] = ("?/edit/" . $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"));
        }
        // line 6
        echo "
<form action=\"";
        // line 7
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\">
\t<input type=\"hidden\" name=\"token\" value=\"";
        // line 8
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "\">
\t<table>
\t\t<tr>
\t\t\t<th>";
        // line 11
        echo gettext("URI");
        echo "</th>
\t\t\t<td>
\t\t\t\t";
        // line 13
        if ((!(isset($context["new"]) ? $context["new"] : null))) {
            // line 14
            echo "\t\t\t\t\t";
            echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "uri"));
            echo "
\t\t\t\t";
        } else {
            // line 16
            echo "\t\t\t\t\t/<input size=\"10\" maxlength=\"255\" type=\"text\" name=\"uri\" autocomplete=\"off\">/
\t\t\t\t";
        }
        // line 18
        echo "\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>";
        // line 21
        echo gettext("Title");
        echo "</th>
\t\t\t<td>
\t\t\t\t<input size=\"25\" type=\"text\" name=\"title\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "title"));
        echo "\" autocomplete=\"off\">
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>";
        // line 27
        echo gettext("Subtitle");
        echo "</th>
\t\t\t<td>
\t\t\t\t<input size=\"25\" type=\"text\" name=\"subtitle\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["board"]) ? $context["board"] : null), "subtitle"));
        echo "\" autocomplete=\"off\">
\t\t\t</td>
\t\t</tr>
\t</table>
\t
\t<ul style=\"padding:0;text-align:center;list-style:none\">
\t\t";
        // line 35
        if ((isset($context["new"]) ? $context["new"] : null)) {
            // line 36
            echo "\t\t\t<li><input type=\"submit\" value=\"";
            echo gettext("Create board");
            echo "\"></li>
\t\t";
        } else {
            // line 38
            echo "\t\t\t<li><input type=\"submit\" value=\"";
            echo gettext("Save changes");
            echo "\"></li>
\t\t\t";
            // line 39
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "deleteboard"))) {
                // line 40
                echo "\t\t\t\t<li><input name=\"delete\" onclick=\"return confirm('Are you sure you want to permanently delete this board?');\" type=\"submit\" value=\"";
                echo gettext("Delete board");
                echo "\"></li>
\t\t\t";
            }
            // line 42
            echo "\t\t";
        }
        // line 43
        echo "\t</ul>
</form>

";
    }

    public function getTemplateName()
    {
        return "mod/board.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 43,  114 => 42,  108 => 40,  106 => 39,  101 => 38,  95 => 36,  93 => 35,  84 => 29,  79 => 27,  72 => 23,  67 => 21,  62 => 18,  58 => 16,  52 => 14,  50 => 13,  45 => 11,  39 => 8,  35 => 7,  32 => 6,  28 => 4,  24 => 2,  22 => 1,);
    }
}
