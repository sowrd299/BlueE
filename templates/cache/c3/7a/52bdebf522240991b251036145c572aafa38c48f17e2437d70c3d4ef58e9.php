<?php

/* mod/edit_post_form.html */
class __TwigTemplate_c37a52bdebf522240991b251036145c572aafa38c48f17e2437d70c3d4ef58e9 extends Twig_Template
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
        echo "<form action=\"\" method=\"post\">
\t<input type=\"hidden\" name=\"token\" value=\"";
        // line 2
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "\">
\t
\t<table>
\t\t<tr>
\t\t\t<th>
\t\t\t\t";
        // line 7
        echo gettext("Name");
        // line 8
        echo "\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"text\" name=\"name\" size=\"25\" maxlength=\"35\" autocomplete=\"off\" value=\"";
        // line 10
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "name");
        echo "\">
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>
\t\t\t\t";
        // line 15
        echo gettext("Email");
        // line 16
        echo "\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input type=\"text\" name=\"email\" size=\"25\" maxlength=\"40\" autocomplete=\"off\" value=\"";
        // line 18
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "email");
        echo "\">
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>
\t\t\t\t";
        // line 23
        echo gettext("Subject");
        // line 24
        echo "\t\t\t</th>
\t\t\t<td>
\t\t\t\t<input style=\"float:left;\" type=\"text\" name=\"subject\" size=\"25\" maxlength=\"100\" autocomplete=\"off\" value=\"";
        // line 26
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "subject");
        echo "\">
\t\t\t\t<input accesskey=\"s\" style=\"margin-left:2px;\" type=\"submit\" name=\"post\" value=\"";
        // line 27
        echo gettext("Update");
        echo "\">
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th>
\t\t\t\t";
        // line 32
        echo gettext("Comment");
        // line 33
        echo "\t\t\t</th>
\t\t\t<td>
\t\t\t\t<textarea name=\"body\" id=\"body\" rows=\"8\" cols=\"35\">";
        // line 35
        if ((isset($context["raw"]) ? $context["raw"] : null)) {
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body");
        } else {
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "body_nomarkup");
        }
        echo "</textarea>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<p style=\"text-align:center\">
\t\t";
        // line 40
        if ((isset($context["raw"]) ? $context["raw"] : null)) {
            // line 41
            echo "\t\t\t";
            echo gettext("Currently editing raw HTML.");
            echo " 
\t\t\t<a href=\"?/";
            // line 42
            echo (isset($context["board"]) ? $context["board"] : null);
            echo "/edit/";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
            echo "\">";
            echo gettext("Edit markup instead?");
            echo "</a>
\t\t";
        } else {
            // line 44
            echo "\t\t\t<a href=\"?/";
            echo (isset($context["board"]) ? $context["board"] : null);
            echo "/edit_raw/";
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "id");
            echo "\">";
            echo gettext("Edit raw HTML instead?");
            echo "</a>
\t\t";
        }
        // line 46
        echo "\t</p>
</form>
";
    }

    public function getTemplateName()
    {
        return "mod/edit_post_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 46,  113 => 44,  104 => 42,  99 => 41,  97 => 40,  85 => 35,  81 => 33,  79 => 32,  71 => 27,  67 => 26,  63 => 24,  61 => 23,  53 => 18,  49 => 16,  47 => 15,  39 => 10,  35 => 8,  33 => 7,  25 => 2,  22 => 1,);
    }
}
