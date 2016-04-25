/**
 * Using babel to compile jsx every time that you change it
 * @see http://facebook.github.io/react/docs/getting-started.html
 *  sh$ sudo npm install --global babel-cli
 *  sh$ sudo npm install babel-preset-react
 *  sh$ babel --presets react <$source_file> --watch --out-dir <$build_to>
 *  sh$ babel --presets react src --watch --out-dir build
 */

 
 /**
  *
  */
 <a href="javascript:void(0)" data-type="data" onClick=bound_handle className="cls" id="">Aaron</a>
 <label htmlFor="password"><input type="password" name="password"/> 

/**
 * @see https://facebook.github.io/react/docs/tags-and-attributes.html
 */
/**
 * @warning distinguish the `this` is map
 * this.[state|prop].vars.map(function(item, i){}, hanle_this = each item);
 */
handle: function(){},
render: function(){
  var parent = this;
  return (
    <div>{
      this.state.items.map(function(item, i){
        var bound_handle = parent.handle.bind(item, i);    // notice `parent`
        return (
          <a href="javascript:void(0)" onClick=bound_handle>Aaron</a>
          <a href="javascript:void(0)" onClick=parent.handle>Script</a>
        );
      });
    }</div>
  );
}

render: function(){
  var list = this.props.items.map(function(item, i){
    var bound_handle = this.handle.bind(item, i);
    return (
      <a href="javascript:void(0)" onClick=bound_handle>Aaron</a>
      <a href="javascript:void(0)" onClick=this.handle>Script</a>
    );
  }, this);     // assign interior `this` to outter `this`
  return (
    <div>{list}</div>
  );
}

/**
 * Class and Inline Styles handle
 * @see http://facebook.github.io/react/tips/inline-styles.html
 */
render: function(){
  var style = {
    color: '#f00',
    backgroundImage: 'url(lef_well.png)',
  };

  // <div class="p"> or <div class="p a"> or  <div class="p a mg"> ...
  return <div style={style}></div>
}

/**
 * @see
 *  https://facebook.github.io/react/tips/expose-component-functions.html
 *  http://facebook.github.io/react/docs/events.html
 * Events:
 *  SyntheticEvent
 *  Clipboard Events: onCopy onCut onPaste
 *    DomDataTransfer clipboardData
 *  Keyboard Events:  onKeyDown onKeyPress onKeyUp
 *    boolean:  altKey ctrlKey metaKey repeat shiftKey
 *    Number:   charCode keyCode location which
 *    function: getModifierState(key)
 *    String:   key locale
 *  Focus Events: onFocus onBlur
 *    DOMEventTarget relatedTarget
 *  Form Events: onChange onInput onSubmit
 *  Mouse Events:
 *    onClick onContextMenu onDoubleClick onDrag onDragEnd onDragEnter onDragExit
 *    onDragLeave onDragOver onDragStart onDrop onMouseDown onMouseEnter onMouseLeave
 *    onMouseMove onMouseOut onMouseOver onMouseUp
 *      boolean altKey ctrlKey metaKey shiftKey
 *      Number button buttons clientX clientY pageX pageY screenX screenY
 *      function getModifierState(key)
 *      DOMEventTarget relatedTarget
 *  Touch Evnets: onTouchCancel onTouchEnd onTouchMove onTouchStart
 *  UI Events: onScrool
 *    Number detail
 *    DOMAbstractView view
 *  Wheel Events: onWheel
 *    Number: daltaMode deltaX deltaY deltaZ
 */


 
var Rcc = React.createClass({
  /**
   * Component Sepecifications
   * @see https://facebook.github.io/react/docs/component-specs.html
   *  getInitialState()
   *  propTypes()
   *  mixins
   * @see https://facebook.github.io/react/docs/reusable-components.html 
   */
  getInitialState: function(){},
  handleClick: function(item, e){
    this.setState({articleList:res.data});
    console.log(e.target); 
  },
  componentDidMount: function(){
    this.handleClick();
    //setInterval(this.handleClick, 30000);   // 轮询
  },
  render: function(){
    var ancient = this;
    return (
      <div>
        {
          this.state.items.map(function(item, i){
            return (
              <div onClick={ancient.handleClick.bind(this, item)}></div>
              <div onClick={ancient.handleClick}></div>
            ); 
          }, this)     // bind this to child
        }
      </div>
    );
  }
});
