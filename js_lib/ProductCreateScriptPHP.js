function createbox(ParentElement, pr_name, icon_im, image_im, d_a1, d_a2, d_b1, d_b2, d_c1, d_c2, pr_price) {
    let box = document.createElement('div');
    box.id = "pr-content-hover";

    let box_origin = document.createElement('a');
    box_origin.id = "pr";
    box_origin.href = '#';

    let box_origin2 = document.createElement('div');
    box_origin2.id = "pr2";

    let icon = document.createElement('div');
    icon.id = "pr_icon";
    icon.style.background = 'url(Icons/Products/' + icon_im + ') no-repeat';
    icon.style.backgroundSize = '100%';

    let gal = document.createElement('div');
    gal.id = "pr_gallery";
    gal.style.background = 'url(parts/' + image_im + ') no-repeat';
    gal.style.backgroundPosition = 'center';
    gal.style.backgroundSize = 'contain';

    var link_product = document.createElement('div');
    link_product.style.textDecoration = 'none';

    let desc = document.createElement('p');
    desc.id = "pr_desc";
    desc.innerHTML = pr_name;

    let pars_text = document.createElement('div');
    pars_text.style.width = '100%';
    pars_text.style.height = 'auto';

    let par1 = document.createElement('p');
    par1.id = "pr-desc-misc";
    par1.innerHTML = d_a1 + ": <mark>" + d_a2;

    let par2 = document.createElement('p');
    par2.id = "pr-desc-misc";
    par2.innerHTML = d_b1 + ": <mark>" + d_b2;

    let par3 = document.createElement('p');
    par3.id = "pr-desc-misc";
    par3.innerHTML = d_c1 + ": <mark>" + d_c2;

    let price_box = document.createElement('div');
    price_box.id = "pr-price-box";

    let price_amount = document.createElement('p');
    price_amount.id = "pr-price-amount";
    price_amount.innerHTML = pr_price + '$';

    let choice_box = document.createElement('div');
    choice_box.id = "pr-choice";

    var choice_buy = document.createElement('a');
    choice_buy.id = "choice-buy";
    choice_buy.href = '#';

    var choice_buy_img = document.createElement('div');
    choice_buy_img.id = "choice-buy-img";

    let text_buy = document.createElement('p');
    text_buy.id = "text-choise";
    text_buy.innerHTML = 'Buy now';

    var choice_compare = document.createElement('a');
    choice_compare.id = "choice-compare";
    choice_compare.href = '#';

    var choice_compare_img = document.createElement('div');
    choice_compare_img.id = "choice-compare-img";

    let text_compare = document.createElement('p');
    text_compare.id = "text-choise";
    text_compare.innerHTML = 'Compare';

    ParentElement.append(box);
    box.append(box_origin);
    box_origin.append(box_origin2);
    box_origin2.prepend(icon);
    box_origin2.append(gal);
    gal.after(link_product);
    link_product.append(desc);
    link_product.append(pars_text);
    pars_text.append(par1);
    par1.after(par2);
    par2.after(par3);
    box_origin2.append(price_box);
    price_box.prepend(price_amount);
    price_box.append(choice_box);

    choice_box.append(choice_buy);
    choice_buy.append(choice_buy_img);
    choice_buy_img.append(text_buy);
    choice_box.append(choice_compare);
    choice_compare.append(choice_compare_img);
    choice_compare_img.append(text_compare);
};