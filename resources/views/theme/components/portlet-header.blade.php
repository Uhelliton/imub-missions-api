<div class="mr-auto">
    <h3 class="m-subheader__title m-subheader__title--separator">
        {{ $title }}
    </h3>
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" style="max-height: 60px">
        <li class="m-nav__item m-nav__item--home">
            <a href="#" class="m-nav__link m-nav__link--icon">
                <i class="m-nav__link-icon la la-home"></i>
            </a>
        </li>
        <li class="m-nav__separator">
            -
        </li>
        <li class="m-nav__item">
            <a href="" class="m-nav__link">
                <span class="m-nav__link-text">
                    {{ $category }}
                </span>
            </a>
        </li>
        <li class="m-nav__separator">
            -
        </li>
        <li class="m-nav__item">
            <a href="" class="m-nav__link">
                <span class="m-nav__link-text">
                     {{ $subcategory }}
                </span>
            </a>
        </li>
    </ul>
</div>