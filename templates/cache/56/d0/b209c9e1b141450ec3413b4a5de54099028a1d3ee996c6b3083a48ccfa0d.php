<?php

/* mod/config-editor.html */
class __TwigTemplate_56d0b209c9e1b141450ec3413b4a5de54099028a1d3ee996c6b3083a48ccfa0d extends Twig_Template
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
        echo "<p>
\tAny changes you make here will simply be appended to <code>";
        // line 2
        echo (isset($context["file"]) ? $context["file"] : null);
        echo "</code>. If you wish to make the most of Tinyboard's customizability, you can instead edit the file directly. This page is intended for making quick changes and for those who don't have a basic understanding of PHP code.
</p>
";
        // line 4
        if (count((isset($context["boards"]) ? $context["boards"] : null))) {
            // line 5
            echo "\t<ul>
\t\t";
            // line 6
            if ((isset($context["board"]) ? $context["board"] : null)) {
                // line 7
                echo "\t\t\t<li><a href=\"?/config\">Edit site-wide config</a></li>
\t\t";
            }
            // line 9
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["boards"]) ? $context["boards"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["_board"]) {
                if (($this->getAttribute((isset($context["_board"]) ? $context["_board"] : null), "uri") != (isset($context["board"]) ? $context["board"] : null))) {
                    // line 10
                    echo "\t\t\t<li>
\t\t\t\t<a href=\"?/config/";
                    // line 11
                    echo $this->getAttribute((isset($context["_board"]) ? $context["_board"] : null), "uri");
                    echo "\">Edit config for ";
                    echo sprintf($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "board_abbreviation"), $this->getAttribute((isset($context["_board"]) ? $context["_board"] : null), "uri"));
                    echo "</a>
\t\t\t</li>
\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_board'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "\t</ul>
";
        }
        // line 16
        echo "<form method=\"post\" action=\"\">
\t<input type=\"hidden\" name=\"token\" value=\"";
        // line 17
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "\">
\t<table class=\"mod config-editor\">
\t\t<tr>
\t\t\t<th class=\"minimal\">";
        // line 20
        echo gettext("Name");
        echo "</th>
\t\t\t<th>";
        // line 21
        echo gettext("Value");
        echo "</th>
\t\t\t<th class=\"minimal\">";
        // line 22
        echo gettext("Type");
        echo "</th>
\t\t\t<th>";
        // line 23
        echo gettext("Description");
        echo "</th>
\t\t</tr>
\t\t";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["conf"]) ? $context["conf"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
            if (($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type") != "array")) {
                // line 26
                echo "\t\t\t";
                if ((count($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "name")) == 1)) {
                    // line 27
                    echo "\t\t\t\t";
                    $context["name"] = ("cf_" . $this->getAttribute((isset($context["var"]) ? $context["var"] : null), "name"));
                    // line 28
                    echo "\t\t\t";
                } else {
                    // line 29
                    echo "\t\t\t\t";
                    $context["name"] = ("cf_" . twig_join_filter($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "name"), "/"));
                    // line 30
                    echo "\t\t\t";
                }
                // line 31
                echo "\t\t\t
\t\t\t<tr>
\t\t\t\t<th class=\"minimal\">
\t\t\t\t\t";
                // line 34
                if ((count($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "name")) == 1)) {
                    // line 35
                    echo "\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["var"]) ? $context["var"] : null), "name");
                    echo "
\t\t\t\t\t";
                } else {
                    // line 37
                    echo "\t\t\t\t\t\t";
                    echo twig_join_filter($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "name"), " &rarr; ");
                    echo "
\t\t\t\t\t";
                }
                // line 39
                echo "\t\t\t\t</th>
\t\t\t\t
\t\t\t\t<td>
\t\t\t\t\t";
                // line 42
                if (($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type") == "string")) {
                    // line 43
                    echo "\t\t\t\t\t\t<input name=\"";
                    echo (isset($context["name"]) ? $context["name"] : null);
                    echo "\" type=\"text\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : null), "value"));
                    echo "\">
\t\t\t\t\t";
                } elseif ($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "permissions")) {
                    // line 45
                    echo "\t\t\t\t\t\t<select name=\"";
                    echo (isset($context["name"]) ? $context["name"] : null);
                    echo "\">
\t\t\t\t\t\t\t";
                    // line 46
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "groups"));
                    foreach ($context['_seq'] as $context["group_value"] => $context["group_name"]) {
                        // line 47
                        echo "\t\t\t\t\t\t\t\t<option value=\"";
                        echo (isset($context["group_value"]) ? $context["group_value"] : null);
                        echo "\"";
                        if (($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "value") == (isset($context["group_value"]) ? $context["group_value"] : null))) {
                            echo " selected";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t";
                        // line 48
                        echo (isset($context["group_name"]) ? $context["group_name"] : null);
                        echo "
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['group_value'], $context['group_name'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 51
                    echo "\t\t\t\t\t\t</select>
\t\t\t\t\t";
                } elseif (($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type") == "integer")) {
                    // line 53
                    echo "\t\t\t\t\t\t<input name=\"";
                    echo (isset($context["name"]) ? $context["name"] : null);
                    echo "\" type=\"number\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : null), "value"));
                    echo "\">
\t\t\t\t\t";
                } elseif (($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type") == "boolean")) {
                    // line 55
                    echo "\t\t\t\t\t\t<input name=\"";
                    echo (isset($context["name"]) ? $context["name"] : null);
                    echo "\" type=\"checkbox\" ";
                    if ($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "value")) {
                        echo "checked";
                    }
                    echo ">
\t\t\t\t\t";
                } else {
                    // line 57
                    echo "\t\t\t\t\t\t?
\t\t\t\t\t";
                }
                // line 59
                echo "\t\t\t\t\t
\t\t\t\t\t";
                // line 60
                if ((($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type") == "integer") || ($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type") == "boolean"))) {
                    // line 61
                    echo "\t\t\t\t\t <small>Default: <code>";
                    echo $this->getAttribute((isset($context["var"]) ? $context["var"] : null), "default");
                    echo "</code></small>
\t\t\t\t\t";
                }
                // line 63
                echo "\t\t\t\t</td>
\t\t\t\t
\t\t\t\t<td class=\"minimal\">
\t\t\t\t\t";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : null), "type"));
                echo "
\t\t\t\t</td>
\t\t\t\t
\t\t\t\t<td style=\"word-wrap:break-word;width:50%\">
\t\t\t\t\t";
                // line 70
                echo twig_join_filter($this->getAttribute((isset($context["var"]) ? $context["var"] : null), "comment"), " ");
                echo "
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['var'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "\t</table>
\t
\t<ul style=\"padding:0;text-align:center;list-style:none\">
\t\t<li><input name=\"save\" type=\"submit\" value=\"";
        // line 77
        echo gettext("Save changes");
        echo "\"></li>
\t</ul>
</form>

";
    }

    public function getTemplateName()
    {
        return "mod/config-editor.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 77,  233 => 74,  222 => 70,  215 => 66,  210 => 63,  204 => 61,  202 => 60,  199 => 59,  195 => 57,  185 => 55,  177 => 53,  173 => 51,  164 => 48,  155 => 47,  151 => 46,  146 => 45,  138 => 43,  136 => 42,  131 => 39,  125 => 37,  119 => 35,  117 => 34,  112 => 31,  109 => 30,  106 => 29,  103 => 28,  100 => 27,  97 => 26,  92 => 25,  87 => 23,  83 => 22,  79 => 21,  75 => 20,  69 => 17,  66 => 16,  62 => 14,  50 => 11,  47 => 10,  41 => 9,  37 => 7,  35 => 6,  32 => 5,  30 => 4,  25 => 2,  22 => 1,);
    }
}
