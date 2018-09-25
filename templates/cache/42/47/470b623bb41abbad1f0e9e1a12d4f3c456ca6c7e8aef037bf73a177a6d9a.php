<?php

/* mod/themes.html */
class __TwigTemplate_4247470b623bb41abbad1f0e9e1a12d4f3c456ca6c7e8aef037bf73a177a6d9a extends Twig_Template
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
        if ((count((isset($context["themes"]) ? $context["themes"] : null)) == 0)) {
            // line 2
            echo "\t<p style=\"text-align:center\" class=\"unimportant\">(";
            echo gettext("There are no themes available.");
            echo ")</p>
";
        } else {
            // line 4
            echo "\t<table class=\"modlog\">
\t\t";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["themes"]) ? $context["themes"] : null));
            foreach ($context['_seq'] as $context["theme_name"] => $context["theme"]) {
                // line 6
                echo "\t\t\t<tr>
\t\t\t\t<th class=\"minimal\">";
                // line 7
                echo gettext("Name");
                echo "</th>
\t\t\t\t\t<td>";
                // line 8
                echo $this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "name");
                echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"minimal\">";
                // line 11
                echo gettext("Version");
                echo "</th>
\t\t\t\t\t<td>";
                // line 12
                echo $this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "version");
                echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"minimal\">";
                // line 15
                echo gettext("Description");
                echo "</th>
\t\t\t\t\t<td>";
                // line 16
                echo $this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "description");
                echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"minimal\">";
                // line 19
                echo gettext("Thumbnail");
                echo "</th>
\t\t\t\t\t<td>
\t\t\t\t\t\t<img style=\"float:none;margin:4px";
                // line 21
                if (twig_in_filter((isset($context["theme_name"]) ? $context["theme_name"] : null), (isset($context["themes_in_use"]) ? $context["themes_in_use"] : null))) {
                    echo ";border:2px solid red;padding:4px";
                }
                echo "\" src=\"";
                echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "dir"), "themes_uri");
                echo "/";
                echo (isset($context["theme_name"]) ? $context["theme_name"] : null);
                echo "/thumb.png\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"minimal\">";
                // line 25
                echo gettext("Actions");
                echo "</th>
\t\t\t\t\t<td><ul style=\"padding:0 20px\">
\t\t\t\t\t\t<li><a title=\" ";
                // line 27
                echo gettext("Use theme");
                echo "\" href=\"?/themes/";
                echo (isset($context["theme_name"]) ? $context["theme_name"] : null);
                echo "\">
\t\t\t\t\t\t\t";
                // line 28
                if (twig_in_filter((isset($context["theme_name"]) ? $context["theme_name"] : null), (isset($context["themes_in_use"]) ? $context["themes_in_use"] : null))) {
                    echo gettext("Reconfigure");
                } else {
                    echo gettext("Install");
                }
                // line 29
                echo "\t\t\t\t\t\t</a></li>
\t\t\t\t\t\t";
                // line 30
                if (twig_in_filter((isset($context["theme_name"]) ? $context["theme_name"] : null), (isset($context["themes_in_use"]) ? $context["themes_in_use"] : null))) {
                    // line 31
                    echo "\t\t\t\t\t\t\t<li><a href=\"?/themes/";
                    echo (isset($context["theme_name"]) ? $context["theme_name"] : null);
                    echo "/rebuild/";
                    echo $this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "rebuild_token");
                    echo "\">";
                    echo gettext("Rebuild");
                    echo "</a></li>
\t\t\t\t\t\t\t<li><a href=\"?/themes/";
                    // line 32
                    echo (isset($context["theme_name"]) ? $context["theme_name"] : null);
                    echo "/uninstall/";
                    echo $this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "uninstall_token");
                    echo "\" onclick=\"return confirm('Are you sure you want to uninstall this theme?');\">";
                    echo gettext("Uninstall");
                    echo "</a></li>
\t\t\t\t\t\t";
                }
                // line 34
                echo "\t\t\t\t\t</ul></td>
\t\t\t\t</tr>
\t\t\t\t<tr style=\"height:40px\"><td colspan=\"2\"><hr/></td></tr>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['theme_name'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "\t</table>
";
        }
    }

    public function getTemplateName()
    {
        return "mod/themes.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 39,  128 => 34,  119 => 32,  110 => 31,  108 => 30,  105 => 29,  99 => 28,  93 => 27,  88 => 25,  75 => 21,  70 => 19,  64 => 16,  60 => 15,  54 => 12,  50 => 11,  44 => 8,  40 => 7,  37 => 6,  33 => 5,  30 => 4,  24 => 2,  22 => 1,);
    }
}
