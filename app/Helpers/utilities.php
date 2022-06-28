<?php

function userFullName()
{
    return auth()->user()->oper_nom;
}