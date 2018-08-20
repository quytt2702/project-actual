import dragula from 'dragula';
import EventEmitter from '../../../utils/EventEmitter';

// Create event emitters
const updateSectionPositionEvent = new EventEmitter();

const sectionSelectedEvent = new EventEmitter();
const sectionMovedEvent = new EventEmitter();
const sectionRemovedEvent = new EventEmitter();

$(function () {

  // Initial Dragula instance
  dragula([
    document.querySelector('#chosen-sections'),
  ], {
    moves: (element, container, handle) => {
      return handle.classList.contains('toolbar__handlebar');
    },
  }).on('drop', element => {
    // Fire event for updating position
    updateSectionPositionEvent.fire(element);
  });

  // ------------------------------------------ //

  // Registering Image Pop Event
  $('.image-popup').magnificPopup({ type: 'image' });

  // Registering Button Events
  $('body').on('click', '.caret-opener', function (e) {
    e.preventDefault();

    const $wrapper = $(this).parent().parent().parent()
      .parent('.selected-section__wrapper');

    $wrapper.toggleClass('selected-section__wrapper--close');
  });

  $('body').on('click', '.caret-closer--bottom', function (e) {
    e.preventDefault();

    const $wrapper = $(this).parent().parent('.selected-section__wrapper');

    $wrapper.toggleClass('selected-section__wrapper--close');

    $('html, body').animate({
      scrollTop: $wrapper.offset().top - 80,
    }, 'fast');
  });

  $('body').on('click', '.caret-closer', function (e) {
    e.preventDefault();

    const $wrapper = $(this).parent().parent().parent()
      .parent().parent('.chosen-section__item');

    $wrapper.remove();

    // Fire event for updating position
    updateSectionPositionEvent.fire();
  });

  $('body').on('click', '.section-selector__item', async function (e) {
    e.preventDefault();

    const code = $(this).data('code');
    const sectionCode = $(this).data('section-code');
    const sectionHash = $(this).data('section-hash');

    if (code && sectionCode) {
      try {
        const payload = {
          section_name: sectionCode,
          sectionHash,
          code
        };
        console.log(payload);
        const { data: { view } } = await axios.post('/admin/landing-page/section/view', payload);

        $('#chosen-sections').append(
          $('<section class="chosen-section__item"/>').html(view)
        );

        updateSectionPositionEvent.fire();
        sectionSelectedEvent.fire();
      } catch (e) {
        //
      }
    }
  });

  // Registering Change Tab Event
  const registerChangeTabEvent = () => {
    $('.countdown-clock-tab').on('shown.bs.tab', function (e) {
      if (e.target) {
        const type = $(e.target).data('type');

        $(this).find('input[type=hidden]').val(type);
      }
    });
  };
  registerChangeTabEvent();

  sectionSelectedEvent.subscribe(() => {
    //
    registerChangeTabEvent();
  });
});

// Section Links
$(function () {

  const initialDragula = () => {
    $('.added-links__wrapper').each(function () {
      dragula([ this ]);
    });
  };
  initialDragula();

  sectionSelectedEvent.subscribe(() => {
    initialDragula()
  });

  $('body').on('click', '.btn-add-link', async function (e) {
    e.preventDefault();

    const sectionCode = $(this).data('section-code');
    const sectionHash = $(this).data('section-hash');

    if (!sectionCode || !sectionHash) {
      return;
    }

    // Split sectionHash
    const sectionHashComponents = sectionHash.split('_');

    try {
      const payload = {
        code: 'admin.landing_page.themes.ca.components.links_item',
        section_name: sectionCode,
        sectionHash: sectionHashComponents[sectionHashComponents.length - 1],
      };

      console.log(payload);

      const { view } = await axios
        .post('/admin/landing-page/section/view', payload)
        .then(res => res.data);

      $(`.section_link__${sectionCode}_${sectionHash}`)
        .find('.added-links__wrapper')
        .append(view);
    } catch (e) {
      //
    }
  });

  $('body').on('click', '.link-remover', function (e) {
    e.preventDefault();

    $(this)
      .parent().parent().parent('.link__wrapper')
      .remove();
  });
});

// Icon Contents
$(function () {

  const initialDragula = () => {
    $('.added-icon-contents__wrapper').each(function () {
      dragula([ this ]);
    });
  };
  initialDragula();

  sectionSelectedEvent.subscribe(() => {
    initialDragula()
  });

  $('body').on('click', '.btn-add-icon-content', async function (e) {
    e.preventDefault();

    const code = 'admin.landing_page.themes.ca.components.icon_content';
    const sectionCode = $(this).data('section-code');
    const sectionHash = $(this).data('section-hash');
    const payload = {
      section_name: sectionCode,
      sectionHash,
      code,
    };

    try {
      const { data: { view } } = await axios.post('/admin/landing-page/section/view', payload);

      console.log($(`.section_icon_contents__${sectionCode}_${sectionHash}`));

      $(`.section_icon_contents__${sectionCode}_${sectionHash}`)
        .find('.added-icon-contents__wrapper')
        .append(
          $('<div class="added-icon-contents__item"/>').html(view)
        );
    } catch (e) {
      //
    }
  });

  $('body').on('click', '.icon-content-remover', function (e) {
    e.preventDefault();

    $(this)
      .parent().parent().parent()
      .parent('.added-icon-contents__item')
      .remove();
  });
});

// Menu Builder
$(function () {

  // Initial Dragula instance
  dragula([
    document.querySelector('#menu-builder tbody'),
  ]);

});


$(function () {

  let isValidUrl = true;
  let checkUrlTimeoutId = null;

  const sendValidationUrl = ( url ) => {
    return axios.post('/admin/landing-page/check-url', { url });
  };

  const validateUrl = async (_this) => {
    let indicatorWrapper = $(_this).siblings('.loading-input__indicator');

    indicatorWrapper.addClass('open');
    indicatorWrapper.find('.fa').attr('class', 'fa fa-spin fa-spinner');
    indicatorWrapper.parent('.loading-input__wrapper').siblings('.help-block').html('');

    try {
      const { data } = await sendValidationUrl(_this.value);

      isValidUrl = true;

      // indicatorWrapper.removeClass('open');
      indicatorWrapper.find('.fa').attr('class', 'fa fa-check text-green');
      indicatorWrapper.parent('.loading-input__wrapper').siblings('.help-block').html(
        $('<span class="text-green" />').html(data.message)
      );

    } catch (e) {
      const { data } = e.response;

      indicatorWrapper.find('.fa').attr('class', 'fa fa-times text-red');
      indicatorWrapper.parent('.loading-input__wrapper').siblings('.help-block').html(
        $('<span class="text-red" />').html(data.message)
      );
    }
  }

  $('body').on('keyup', '.form-url', function (e) {

    clearTimeout(checkUrlTimeoutId);
    checkUrlTimeoutId = setTimeout(async () => {
      await validateUrl(this);
    }, 400);
  });

  $('body').on('submit', '#createLandingPageForm', function (e) {
    if (! isValidUrl) {
      swal('Có lỗi xảy ra', 'Url của Landing Page không hợp lệ', 'error');

      return false;
    }

    return true;
  });
});
