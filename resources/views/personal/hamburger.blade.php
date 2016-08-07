
<style type="text/css">

@import url(http://fonts.googleapis.com/css?family=Roboto);


.wrapper {
  height: 100%;
  transition: all 300ms ease-in-out;  
  margin: 1em 0;
  padding: 0;
}
.menu {
  font-size:2em;
  font-family: 'Roboto', sans-serif;
  color: #333;
}

.menu div {
  margin: 1em;
  padding-bottom: 1em;
  border-bottom: 1px solid #ccc;
}

.menu div:last-child {
  border: 0;
}

.menu--off {
  position: absolute;
  left: -50%;
  width: 30%;
  bottom: -10%;
  display: block;
  background: #eee;
  min-height: 300px;
  height: auto;
  margin-top: 1em;
  transition: all 300ms;
}

.menu--on {
  left: 0;
  box-shadow: 8px 8px 20px 0 rgba(0, 0, 0, 0.2);
  transition: all 300ms;
}

.material-design-hamburger button {
  display: block;
  border: none;
  background: none;
  outline: 0;
}

.material-design-hamburger__icon {
  padding: 3rem 1rem;
  cursor: pointer;
}

.material-design-hamburger__layer {
  display: block;
  width: 70px;
  height: 7px;
  background: #000;
  position: relative;
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
}

.material-design-hamburger__layer:before, .material-design-hamburger__layer:after {
  display: block;
  width: inherit;
  height: 7px;
  position: absolute;
  background: inherit;
  left: 0;
  content: '';
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
}

.material-design-hamburger__layer:before {
  bottom: 200%;
}

.material-design-hamburger__layer:after {
  top: 200%;
}

.material-design-hamburger__icon--to-arrow {
  animation-name: material-design-hamburger__icon--slide;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--to-arrow:before {
  animation-name: material-design-hamburger__icon--slide-before;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--to-arrow:after {
  animation-name: material-design-hamburger__icon--slide-after;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--from-arrow {
  animation-name: material-design-hamburger__icon--slide-from;
}

.material-design-hamburger__icon--from-arrow:before {
  animation-name: material-design-hamburger__icon--slide-before-from;
}

.material-design-hamburger__icon--from-arrow:after {
  animation-name: material-design-hamburger__icon--slide-after-from;
}

@keyframes material-design-hamburger__icon--slide {
  0% {
  }
  100% {
    transform: rotate(180deg);
  }
}

@keyframes material-design-hamburger__icon--slide-before {
  0% {
  }
  100% {
    transform: rotate(45deg);
    margin: 3% 37%;
    width: 75%;
  }
}

@keyframes material-design-hamburger__icon--slide-after {
  0% {
  }
  100% {
    transform: rotate(-45deg);
    margin: 3% 37%;
    width: 75%;
  }
}

@keyframes material-design-hamburger__icon--slide-from {
  0% {
    transform: rotate(-180deg);
  }
  100% {
  }
}

@keyframes material-design-hamburger__icon--slide-before-from {
  0% {
    transform: rotate(45deg);
    margin: 3% 37%;
    width: 75%;
  }
  100% {
  }
}

@keyframes material-design-hamburger__icon--slide-after-from {
  0% {
    transform: rotate(-45deg);
    margin: 3% 37%;
    width: 75%;
  }
  100% {
  }
}

</style>