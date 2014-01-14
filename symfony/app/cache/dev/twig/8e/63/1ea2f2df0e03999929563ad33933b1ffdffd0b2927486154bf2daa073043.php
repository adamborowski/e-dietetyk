<?php

/* DietBundle::spinner.html.twig */
class __TwigTemplate_8e631ea2f2df0e03999929563ad33933b1ffdffd0b2927486154bf2daa073043 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<style>
.windows8 {
    position: relative;
    display:inline-block;
    width: 90px;
    height: 90px;
}
.spinner-container{
    width: 100%;
    height:100%;
    text-align: center;
    vertical-align: middle;
    padding: 140px;
}

.windows8 .wBall {
    position: absolute;
    width: 86px;
    height: 86px;
    opacity: 0;
    -moz-transform: rotate(225deg);
    -moz-animation: orbit 3.3s infinite;
    -webkit-transform: rotate(225deg);
    -webkit-animation: orbit 3.3s infinite;
    -ms-transform: rotate(225deg);
    -ms-animation: orbit 3.3s infinite;
    -o-transform: rotate(225deg);
    -o-animation: orbit 3.3s infinite;
    transform: rotate(225deg);
    animation: orbit 3.3s infinite;
}

.windows8 .wBall .wInnerBall{
    position: absolute;
    width: 11px;
    height: 11px;
    background: #919191;
    left:0px;
    top:0px;
    -moz-border-radius: 11px;
    -webkit-border-radius: 11px;
    -ms-border-radius: 11px;
    -o-border-radius: 11px;
    border-radius: 11px;
}

.windows8 #wBall_1 {
    -moz-animation-delay: 0.72s;
    -webkit-animation-delay: 0.72s;
    -ms-animation-delay: 0.72s;
    -o-animation-delay: 0.72s;
    animation-delay: 0.72s;
}

.windows8 #wBall_2 {
    -moz-animation-delay: 0.14s;
    -webkit-animation-delay: 0.14s;
    -ms-animation-delay: 0.14s;
    -o-animation-delay: 0.14s;
    animation-delay: 0.14s;
}

.windows8 #wBall_3 {
    -moz-animation-delay: 0.29s;
    -webkit-animation-delay: 0.29s;
    -ms-animation-delay: 0.29s;
    -o-animation-delay: 0.29s;
    animation-delay: 0.29s;
}

.windows8 #wBall_4 {
    -moz-animation-delay: 0.43s;
    -webkit-animation-delay: 0.43s;
    -ms-animation-delay: 0.43s;
    -o-animation-delay: 0.43s;
    animation-delay: 0.43s;
}

.windows8 #wBall_5 {
    -moz-animation-delay: 0.58s;
    -webkit-animation-delay: 0.58s;
    -ms-animation-delay: 0.58s;
    -o-animation-delay: 0.58s;
    animation-delay: 0.58s;
}

@-moz-keyframes orbit {
    0% {
        opacity: 1;
        z-index:99;
        -moz-transform: rotate(180deg);
        -moz-animation-timing-function: ease-out;
    }

    7% {
        opacity: 1;
        -moz-transform: rotate(300deg);
        -moz-animation-timing-function: linear;
        -moz-origin:0%;
    }

    30% {
        opacity: 1;
        -moz-transform:rotate(410deg);
        -moz-animation-timing-function: ease-in-out;
        -moz-origin:7%;
    }

    39% {
        opacity: 1;
        -moz-transform: rotate(645deg);
        -moz-animation-timing-function: linear;
        -moz-origin:30%;
    }

    70% {
        opacity: 1;
        -moz-transform: rotate(770deg);
        -moz-animation-timing-function: ease-out;
        -moz-origin:39%;
    }

    75% {
        opacity: 1;
        -moz-transform: rotate(900deg);
        -moz-animation-timing-function: ease-out;
        -moz-origin:70%;
    }

    76% {
        opacity: 0;
        -moz-transform:rotate(900deg);
    }

    100% {
        opacity: 0;
        -moz-transform: rotate(900deg);
    }

}

@-webkit-keyframes orbit {
    0% {
        opacity: 1;
        z-index:99;
        -webkit-transform: rotate(180deg);
        -webkit-animation-timing-function: ease-out;
    }

    7% {
        opacity: 1;
        -webkit-transform: rotate(300deg);
        -webkit-animation-timing-function: linear;
        -webkit-origin:0%;
    }

    30% {
        opacity: 1;
        -webkit-transform:rotate(410deg);
        -webkit-animation-timing-function: ease-in-out;
        -webkit-origin:7%;
    }

    39% {
        opacity: 1;
        -webkit-transform: rotate(645deg);
        -webkit-animation-timing-function: linear;
        -webkit-origin:30%;
    }

    70% {
        opacity: 1;
        -webkit-transform: rotate(770deg);
        -webkit-animation-timing-function: ease-out;
        -webkit-origin:39%;
    }

    75% {
        opacity: 1;
        -webkit-transform: rotate(900deg);
        -webkit-animation-timing-function: ease-out;
        -webkit-origin:70%;
    }

    76% {
        opacity: 0;
        -webkit-transform:rotate(900deg);
    }

    100% {
        opacity: 0;
        -webkit-transform: rotate(900deg);
    }

}

@-ms-keyframes orbit {
    0% {
        opacity: 1;
        z-index:99;
        -ms-transform: rotate(180deg);
        -ms-animation-timing-function: ease-out;
    }

    7% {
        opacity: 1;
        -ms-transform: rotate(300deg);
        -ms-animation-timing-function: linear;
        -ms-origin:0%;
    }

    30% {
        opacity: 1;
        -ms-transform:rotate(410deg);
        -ms-animation-timing-function: ease-in-out;
        -ms-origin:7%;
    }

    39% {
        opacity: 1;
        -ms-transform: rotate(645deg);
        -ms-animation-timing-function: linear;
        -ms-origin:30%;
    }

    70% {
        opacity: 1;
        -ms-transform: rotate(770deg);
        -ms-animation-timing-function: ease-out;
        -ms-origin:39%;
    }

    75% {
        opacity: 1;
        -ms-transform: rotate(900deg);
        -ms-animation-timing-function: ease-out;
        -ms-origin:70%;
    }

    76% {
        opacity: 0;
        -ms-transform:rotate(900deg);
    }

    100% {
        opacity: 0;
        -ms-transform: rotate(900deg);
    }

}

@-o-keyframes orbit {
    0% {
        opacity: 1;
        z-index:99;
        -o-transform: rotate(180deg);
        -o-animation-timing-function: ease-out;
    }

    7% {
        opacity: 1;
        -o-transform: rotate(300deg);
        -o-animation-timing-function: linear;
        -o-origin:0%;
    }

    30% {
        opacity: 1;
        -o-transform:rotate(410deg);
        -o-animation-timing-function: ease-in-out;
        -o-origin:7%;
    }

    39% {
        opacity: 1;
        -o-transform: rotate(645deg);
        -o-animation-timing-function: linear;
        -o-origin:30%;
    }

    70% {
        opacity: 1;
        -o-transform: rotate(770deg);
        -o-animation-timing-function: ease-out;
        -o-origin:39%;
    }

    75% {
        opacity: 1;
        -o-transform: rotate(900deg);
        -o-animation-timing-function: ease-out;
        -o-origin:70%;
    }

    76% {
        opacity: 0;
        -o-transform:rotate(900deg);
    }

    100% {
        opacity: 0;
        -o-transform: rotate(900deg);
    }

}

@keyframes orbit {
    0% {
        opacity: 1;
        z-index:99;
        transform: rotate(180deg);
        animation-timing-function: ease-out;
    }

    7% {
        opacity: 1;
        transform: rotate(300deg);
        animation-timing-function: linear;
        origin:0%;
    }

    30% {
        opacity: 1;
        transform:rotate(410deg);
        animation-timing-function: ease-in-out;
        origin:7%;
    }

    39% {
        opacity: 1;
        transform: rotate(645deg);
        animation-timing-function: linear;
        origin:30%;
    }

    70% {
        opacity: 1;
        transform: rotate(770deg);
        animation-timing-function: ease-out;
        origin:39%;
    }

    75% {
        opacity: 1;
        transform: rotate(900deg);
        animation-timing-function: ease-out;
        origin:70%;
    }

    76% {
        opacity: 0;
        transform:rotate(900deg);
    }

    100% {
        opacity: 0;
        transform: rotate(900deg);
    }

}

</style>
<div class=\"spinner-container\" id=\"ext-loading-spinner\">
    <div class=\"windows8 spinner\">
        <div class=\"wBall\" id=\"wBall_1\">
            <div class=\"wInnerBall\">
            </div>
        </div>
        <div class=\"wBall\" id=\"wBall_2\">
            <div class=\"wInnerBall\">
            </div>
        </div>
        <div class=\"wBall\" id=\"wBall_3\">
            <div class=\"wInnerBall\">
            </div>
        </div>
        <div class=\"wBall\" id=\"wBall_4\">
            <div class=\"wInnerBall\">
            </div>
        </div>
        <div class=\"wBall\" id=\"wBall_5\">
            <div class=\"wInnerBall\">
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "DietBundle::spinner.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
