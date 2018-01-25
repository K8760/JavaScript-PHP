writeToScreen("Initial");

// Component component
var Component = React.createClass({
    
    getInitialState: function() {
        writeToScreen("Component - getInitialState");
        return {index : 1};  
    },
  
    getDefaultProps: function() {
        writeToScreen("Component - getDefaultProps");
        return {value: 1};
    },
  
    update: function() {
        writeToScreen("Component - updating State");
        this.setState({index: this.state.index+1});
    },

    render: function() {
        writeToScreen("Component - render");
        return (
            <div>
                - this.state.index: {this.state.index} <br/>
                - this.props.value: {this.props.value} <br/><br/>
                <button onClick={this.update}>Update State</button>
            </div>
        );
    },
  
    componentWillMount: function() {
        writeToScreen("Component - componentWillMount");
    },
  
    componentDidMount: function() {
        writeToScreen("Component - componentDidMount");
    },
  
    shouldComponentUpdate: function() {
        writeToScreen("Component - shouldComponentUpdate");
        return true;
    },
  
    componentWillReceiveProps: function(nextProps) {
        writeToScreen("Component - componentWillRecieveProps");
        this.props.value = nextProps.value;
    },
  
    componentWillUpdate: function() {
        writeToScreen("Component - componentWillUpdate");
    },
  
    componentDidUpdate: function() {
        writeToScreen("Component - componentDidUpdate");
    },
  
    componentWillUnmount: function() {
        writeToScreen("Component - componentWillUnmount");
    }

});

var App = React.createClass({
    
    getInitialState: function() {
        writeToScreen("App - getInitialState");
        return {value: 1};
    },
    
    getDefaultProps: function() {
        writeToScreen("App - getDefaultProps");
    },
  
    update: function() {
        writeToScreen("App - updating Props");
        this.setState({value: this.state.value+1});  
    },
  
    render: function() {
        writeToScreen("App - render");
        return (
            <div>
                <hr/>
                <h4>Component</h4>
                <Component value={this.state.value} />
                <hr />
                <h4>App</h4>
                <button onClick={this.update}>Update Props</button>
            </div>
        )
    },
    
    componentWillMount: function() {
        writeToScreen("App - componentWillMount");
    },
  
    componentDidMount: function() {
        writeToScreen("App - componentDidMount");
    },
  
    shouldComponentUpdate: function() {
        writeToScreen("App - shouldComponentUpdate");
        return true;
    },
  
    componentWillReceiveProps: function(nextProps) {
        writeToScreen("App - componentWillRecieveProps");
    },
  
    componentWillUpdate: function() {
        writeToScreen("App - componentWillUpdate");
    },
  
    componentDidUpdate: function() {
        writeToScreen("App - componentDidUpdate");
    },
  
    componentWillUnmount: function() {
        writeToScreen("App - componentWillUnmount");
    }
    
    
});

writeToScreen("ReactDOM - render");

ReactDOM.render(
    <App />,
    document.getElementById('app')
);

var unmountBtn = document.getElementById("unmount");
unmountBtn.addEventListener("click", unmount);

function unmount() {
    writeToScreen("Unmounting");
    ReactDOM.unmountComponentAtNode(document.getElementById("app"));
    dom.remove();
}

function writeToScreen(msg, level) {
    var element = document.getElementById('screen');
    element.innerHTML += "<div>"+msg+"</div>";
}

/*
getDefaultProps will be called before ReactDOM.render
*/