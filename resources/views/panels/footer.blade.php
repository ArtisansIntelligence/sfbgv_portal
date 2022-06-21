<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2022 <a href="https://artisansintelligence.com"
          target="_blank">ARTISANS INTELLIGENCE</a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">
        Design and Developed by <a href="https://artisansintelligence.com/">ARTISANS INTELLIGENCE PVT LTD</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->