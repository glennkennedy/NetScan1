<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* server/engines/engine.twig */
class __TwigTemplate_b58b7f15e5abf1ede6a01e7832b3314b82e7f2ec4ebad6cbcb7d5b39395baa88 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<h2>
    ";
        // line 2
        echo PhpMyAdmin\Util::getImage("b_engine");
        echo "
    ";
        // line 3
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "
    ";
        // line 4
        echo PhpMyAdmin\Util::showMySQLDocu(($context["help_page"] ?? null));
        echo "
</h2>
<p><em>";
        // line 6
        echo twig_escape_filter($this->env, ($context["comment"] ?? null), "html", null, true);
        echo "</em></p>

";
        // line 8
        if (( !twig_test_empty(($context["info_pages"] ?? null)) && twig_test_iterable(($context["info_pages"] ?? null)))) {
            // line 9
            echo "    <p>
        <strong>[</strong>
            ";
            // line 11
            if (twig_test_empty(($context["page"] ?? null))) {
                // line 12
                echo "                <strong>";
                echo _gettext("Variables");
                echo "</strong>
            ";
            } else {
                // line 14
                echo "                <a href=\"server_engines.php";
                // line 15
                echo PhpMyAdmin\Url::getCommon(["engine" => ($context["engine"] ?? null)]);
                echo "\">
                    ";
                // line 16
                echo _gettext("Variables");
                // line 17
                echo "                </a>
            ";
            }
            // line 19
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["info_pages"] ?? null));
            foreach ($context['_seq'] as $context["current"] => $context["label"]) {
                // line 20
                echo "                <strong>|</strong>
                ";
                // line 21
                if (((isset($context["page"]) || array_key_exists("page", $context)) && (($context["page"] ?? null) == $context["current"]))) {
                    // line 22
                    echo "                    <strong>";
                    echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                    echo "</strong>
                ";
                } else {
                    // line 24
                    echo "                    <a href=\"server_engines.php";
                    // line 25
                    echo PhpMyAdmin\Url::getCommon(["engine" => ($context["engine"] ?? null), "page" => $context["current"]]);
                    echo "\">
                        ";
                    // line 26
                    echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 29
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['current'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "        <strong>]</strong>
    </p>
";
        }
        // line 33
        echo "
";
        // line 34
        if ( !twig_test_empty(($context["page_output"] ?? null))) {
            // line 35
            echo "    ";
            echo ($context["page_output"] ?? null);
            echo "
";
        } else {
            // line 37
            echo "    <p>";
            echo twig_escape_filter($this->env, ($context["support"] ?? null), "html", null, true);
            echo "</p>
    ";
            // line 38
            echo ($context["variables"] ?? null);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "server/engines/engine.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 38,  127 => 37,  121 => 35,  119 => 34,  116 => 33,  111 => 30,  105 => 29,  99 => 26,  95 => 25,  93 => 24,  87 => 22,  85 => 21,  82 => 20,  77 => 19,  73 => 17,  71 => 16,  67 => 15,  65 => 14,  59 => 12,  57 => 11,  53 => 9,  51 => 8,  46 => 6,  41 => 4,  37 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "server/engines/engine.twig", "/var/www/html/phpMyAdmin/templates/server/engines/engine.twig");
    }
}
