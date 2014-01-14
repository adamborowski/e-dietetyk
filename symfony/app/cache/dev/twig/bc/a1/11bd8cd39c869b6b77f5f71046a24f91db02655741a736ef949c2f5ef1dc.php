<?php

/* DietBundle:Default:index.html.twig */
class __TwigTemplate_bca111bd8cd39c869b6b77f5f71046a24f91db02655741a736ef949c2f5ef1dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DietBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DietBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Strona główna";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <!-- Jumbotron -->
    <div class=\"jumbotron\">
        <h1>Twoja dieta</h1>

        <p class=\"lead\">Załóż profil, ułóż dietę i dobierz ulubione produkty.</p>

        <p>Tak to działa! Szybko, wygodnie i co najważniejsze dokładnie.</p>

        <p>Bez ściemy.</p>

        <p>&nbsp;</p>

        <p><a class=\"btn btn-lg btn-success\" href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("diet_profile");
        echo "\" role=\"button\">Rozpocznij teraz</a></p>
    </div>

    <!-- Example row of columns -->
    <div class=\"row\">
        <div class=\"col-lg-4\">
            <h2>Twój profil</h2>

            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </p>

            <p><a class=\"btn btn-primary\" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("diet_profile");
        echo "\" role=\"button\">Przejdź &raquo;</a></p>
        </div>
        <div class=\"col-lg-4\">
            <h2>Twoja dieta</h2>

            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </p>

            <p><a class=\"btn btn-primary\" href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("diet_diet");
        echo "\" role=\"button\">Przejdź &raquo;</a></p>
        </div>
        <div class=\"col-lg-4\">
            <h2>Twoje zamówienia</h2>

            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                fermentum massa.</p>

            <p><a class=\"btn btn-primary\" href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("diet_orders");
        echo "\" role=\"button\">Przejdź &raquo;</a></p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "DietBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 48,  79 => 39,  67 => 30,  52 => 18,  38 => 6,  35 => 5,  29 => 3,);
    }
}
