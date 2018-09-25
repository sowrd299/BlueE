<?php

/* mod/new_pm.html */
class __TwigTemplate_22be4a860420ddebd687cce463274558d0d09e69fdc85c8ddad62125068e6b5d extends Twig_Template
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
        echo "<form action=\"?/new_PM/";
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : null));
        echo "\" method=\"post\">
\t<input type=\"hidden\" name=\"token\" value=\"";
        // line 2
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "\">
\t<table>
\t\t<tr>
\t\t\t<th>To</th>
\t\t\t";
        // line 6
        if (twig_hasPermission_filter((isset($context["mod"]) ? $context["mod"] : null), $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "mod"), "editusers"))) {
            // line 7
            echo "\t\t\t\t<td><a href=\"?/users/";
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : null));
            echo "</a></td>
\t\t\t";
        } else {
            // line 9
            echo "\t\t\t\t<td>";
            echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : null));
            echo "</td>
\t\t\t";
        }
        // line 11
        echo "\t\t</tr>
\t\t<tr>
\t\t\t<th>Message</th>
\t\t\t<td><textarea name=\"message\" rows=\"10\" cols=\"40\">";
        // line 14
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "</textarea></td>
\t\t</tr>
\t</table>

\t<p style=\"text-align:center\"><input type=\"submit\" value=\"";
        // line 18
        echo gettext("Send message");
        echo "\"></p>
</form>
";
    }

    public function getTemplateName()
    {
        return "mod/new_pm.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 18,  55 => 14,  50 => 11,  44 => 9,  36 => 7,  34 => 6,  27 => 2,  22 => 1,);
    }
}
