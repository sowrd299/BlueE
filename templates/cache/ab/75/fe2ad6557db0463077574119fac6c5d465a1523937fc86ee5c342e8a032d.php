<?php

/* mod/noticeboard.html */
class __TwigTemplate_ab75fe2ad6557db0463077574119fac6c5d465a1523937fc86ee5c342e8a032d extends Twig_Template
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
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "noticeboard_post"))) {
            // line 2
            echo "\t<fieldset>
\t\t<legend>";
            // line 3
            echo gettext("New post");
            echo "</legend>
\t\t<form style=\"margin:0\" action=\"?/noticeboard\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"token\" value=\"";
            // line 5
            echo (isset($context["token"]) ? $context["token"] : null);
            echo "\">
\t\t\t<table>
\t\t\t\t<tr>
\t\t\t\t\t<th>";
            // line 8
            echo gettext("Name");
            echo "</th>
\t\t\t\t\t<td>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "username"));
            echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th><label for=\"subject\">";
            // line 12
            echo gettext("Subject");
            echo "</label></th>
\t\t\t\t\t<td><input type=\"text\" size=\"55\" name=\"subject\" id=\"subject\" /></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th>";
            // line 16
            echo gettext("Body");
            echo "</th>
\t\t\t\t\t<td><textarea name=\"body\" style=\"width:100%;height:100px\"></textarea></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<p style=\"text-align:center\">
\t\t\t\t<input type=\"submit\" value=\"";
            // line 21
            echo gettext("Post to noticeboard");
            echo "\" />
\t\t\t</p>
\t\t</form>
\t</fieldset>
";
        }
        // line 26
        echo "
";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["noticeboard"]) ? $context["noticeboard"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 28
            echo "\t<div class=\"ban\">
\t\t";
            // line 29
            if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "noticeboard_delete"))) {
                // line 30
                echo "\t\t\t<span style=\"float:right;padding:2px\">
\t\t\t\t<a class=\"unimportant\" href=\"?/noticeboard/delete/";
                // line 31
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
                echo "/";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "delete_token");
                echo "\">[";
                echo gettext("delete");
                echo "]</a>
\t\t\t</span>
\t\t";
            }
            // line 34
            echo "\t\t<h2 id=\"";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
            echo "\">
\t\t\t<small class=\"unimportant\">
\t\t\t\t<a href=\"#";
            // line 36
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
            echo "\">#</a>
\t\t\t</small> 
\t\t\t";
            // line 38
            if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject")) {
                // line 39
                echo "\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject"));
                echo "
\t\t\t";
            } else {
                // line 41
                echo "\t\t\t\t<em>";
                echo gettext("no subject");
                echo "</em>
\t\t\t";
            }
            // line 42
            echo " 
\t\t\t<small class=\"unimportant\">
\t\t\t\t&mdash; ";
            // line 44
            echo gettext("by");
            echo " 
\t\t\t\t";
            // line 45
            if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "username")) {
                // line 46
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "username"));
                echo "
\t\t\t\t";
            } else {
                // line 48
                echo "\t\t\t\t\t<em>";
                echo gettext("deleted?");
                echo "</em>
\t\t\t\t";
            }
            // line 49
            echo " 
\t\t\t\t";
            // line 50
            echo gettext("at");
            echo " 
\t\t\t\t";
            // line 51
            echo twig_date_filter($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "time"), $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "post_date"));
            echo " 
\t\t\t</small>
\t\t</h2>
\t\t<p>
\t\t\t";
            // line 55
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body");
            echo "
\t\t</p>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "
";
        // line 60
        if (((isset($context["count"]) ? $context["count"] : null) > count((isset($context["noticeboard"]) ? $context["noticeboard"] : null)))) {
            // line 61
            echo "\t<p class=\"unimportant\" style=\"text-align:center;word-wrap:break-word\">
\t\t";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (((isset($context["count"]) ? $context["count"] : null) - 1) / $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "noticeboard_page"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 63
                echo "\t\t\t<a href=\"?/noticeboard/";
                echo ((isset($context["i"]) ? $context["i"] : null) + 1);
                echo "\">[";
                echo ((isset($context["i"]) ? $context["i"] : null) + 1);
                echo "]</a> 
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "\t</p>
";
        }
    }

    public function getTemplateName()
    {
        return "mod/noticeboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 65,  179 => 63,  175 => 62,  172 => 61,  170 => 60,  167 => 59,  157 => 55,  150 => 51,  146 => 50,  143 => 49,  137 => 48,  131 => 46,  129 => 45,  125 => 44,  121 => 42,  115 => 41,  109 => 39,  107 => 38,  102 => 36,  96 => 34,  86 => 31,  83 => 30,  81 => 29,  78 => 28,  74 => 27,  71 => 26,  63 => 21,  55 => 16,  48 => 12,  42 => 9,  38 => 8,  32 => 5,  27 => 3,  24 => 2,  22 => 1,);
    }
}
