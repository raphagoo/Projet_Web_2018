var nbArticles = document.getElementById('nbArticles');

var i = nbArticles.value;


function increaseArtNumber()
{
    //nbArticles.value = ++i;
    //++i
    document.getElementById('nbArticles').setAttribute("VALUE", ++i);
}

function decreaseArtNumber()
{
    if ((i-1) < 1)
    {
        i = 1;
    } else {
        --i;
    }

    //nbArticles.value = i;
    document.getElementById('nbArticles').setAttribute("VALUE", i);
}
