<?php

/* installer/check-requirements.html */
class __TwigTemplate_ca9e60c4b5fcdcd98bbda6052a3ea0683df7f1bb716bccaec451118ba8a48e2e extends Twig_Template
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
        echo "<div style=\"max-width:700px;margin:auto\">
\t<h2 style=\"text-align:center\">Pre-installation tests</h2>
\t<table class=\"modlog\" style=\"margin-top:10px;max-width:600px\">
\t\t<tr>
\t\t\t<th>Category</th>
\t\t\t<th>Test</th>
\t\t\t<th>Result</th>
\t\t</tr>
\t\t";
        // line 9
        $context["errors"] = 0;
        // line 10
        echo "\t\t";
        $context["warnings"] = 0;
        // line 11
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tests"]) ? $context["tests"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
            // line 12
            echo "\t\t\t<tr>
\t\t\t\t<td class=\"minimal\"><strong>";
            // line 13
            echo $this->getAttribute((isset($context["test"]) ? $context["test"] : null), "category");
            echo "</strong></td>
\t\t\t\t<td>";
            // line 14
            echo $this->getAttribute((isset($context["test"]) ? $context["test"] : null), "name");
            echo "</td>
\t\t\t\t<td class=\"minimal\" style=\"text-align:center\">
\t\t\t\t\t";
            // line 16
            if ($this->getAttribute((isset($context["test"]) ? $context["test"] : null), "result")) {
                // line 17
                echo "\t\t\t\t\t\t<i style=\"font-size:11pt;color:#090\" class=\"icon-check-sign\"></i>
\t\t\t\t\t";
            } else {
                // line 19
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context["test"]) ? $context["test"] : null), "required")) {
                    // line 20
                    echo "\t\t\t\t\t\t\t";
                    $context["errors"] = ((isset($context["errors"]) ? $context["errors"] : null) + 1);
                    // line 21
                    echo "\t\t\t\t\t\t\t<i style=\"font-size:11pt;color:#d00\" class=\"icon-exclamation-sign\"></i>
\t\t\t\t\t\t";
                } else {
                    // line 23
                    echo "\t\t\t\t\t\t\t";
                    $context["warnings"] = ((isset($context["warnings"]) ? $context["warnings"] : null) + 1);
                    // line 24
                    echo "\t\t\t\t\t\t\t<i style=\"font-size:11pt;color:#f80\" class=\"icon-warning-sign\"></i>
\t\t\t\t\t\t";
                }
                // line 26
                echo "\t\t\t\t\t";
            }
            // line 27
            echo "\t\t\t\t</td>
\t\t\t</tr>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['test'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "\t</table>
\t";
        // line 31
        if (((isset($context["errors"]) ? $context["errors"] : null) || (isset($context["warnings"]) ? $context["warnings"] : null))) {
            // line 32
            echo "\t\t<p><strong>There were ";
            echo (isset($context["errors"]) ? $context["errors"] : null);
            echo " error(s) and ";
            echo (isset($context["warnings"]) ? $context["warnings"] : null);
            echo " warning(s).</strong></p>
\t\t<ul>
\t\t\t";
            // line 34
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tests"]) ? $context["tests"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
                if ((!$this->getAttribute((isset($context["test"]) ? $context["test"] : null), "result"))) {
                    // line 35
                    echo "\t\t\t\t<li style=\"margin-bottom:5px\">
\t\t\t\t\t";
                    // line 36
                    if ($this->getAttribute((isset($context["test"]) ? $context["test"] : null), "required")) {
                        // line 37
                        echo "\t\t\t\t\t\t<i style=\"font-size:11pt;color:#d00\" class=\"icon-exclamation-sign\"></i> <strong>Error:</strong> 
\t\t\t\t\t";
                    } else {
                        // line 39
                        echo "\t\t\t\t\t\t<i style=\"font-size:11pt;color:#f80\" class=\"icon-warning-sign\"></i> <strong>Warning:</strong> 
\t\t\t\t\t";
                    }
                    // line 41
                    echo "\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["test"]) ? $context["test"] : null), "message");
                    echo "
\t\t\t\t</li>
\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['test'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "\t\t</ul>
\t\t";
            // line 45
            if ((isset($context["errors"]) ? $context["errors"] : null)) {
                // line 46
                echo "\t\t\t<p style=\"text-align:center\"><a href=\"?step=2\">Clik here to ignore errors and attempt installing anyway (not recommended).</a></p>
\t\t";
            } else {
                // line 48
                echo "\t\t\t<p style=\"text-align:center\"><a href=\"?step=2\">Clik here to proceed with installation.</a></p>
\t\t";
            }
            // line 50
            echo "\t";
        } else {
            // line 51
            echo "\t\t<p>There were no errors or warnings. Good!</p>
\t\t<p style=\"text-align:center\"><a href=\"?step=2\">Clik here to proceed with installation.</a></p>
\t";
        }
        // line 54
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "installer/check-requirements.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 54,  146 => 51,  143 => 50,  139 => 48,  135 => 46,  133 => 45,  130 => 44,  119 => 41,  115 => 39,  111 => 37,  109 => 36,  106 => 35,  101 => 34,  93 => 32,  91 => 31,  88 => 30,  80 => 27,  77 => 26,  73 => 24,  70 => 23,  66 => 21,  63 => 20,  60 => 19,  56 => 17,  54 => 16,  49 => 14,  45 => 13,  42 => 12,  37 => 11,  34 => 10,  32 => 9,  22 => 1,);
    }
}
