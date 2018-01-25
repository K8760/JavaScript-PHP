var StopWatch = React.createClass({
    // init states
    getInitialState: function() {
        return {
            running: false,
            timer: null,
            elapsed: 0,
            now: 0,
            label: "Start"
        };
    },
    // start button event handling
    onStartClicked: function() {
        // start or stop 
        if (!this.state.running) {
            // create timer and start updating elapsed state
            // https://www.w3schools.com/jsref/met_win_setinterval.asp
            var timer = setInterval(function() {
                this.setState({elapsed: Date.now()-this.state.now});
            }.bind(this),1); // this scope is needed inside ^ function
            // update states, first call: this.state.elapsed = 0
            this.setState({label:"Stop", running:true, timer:timer, now:Date.now()-this.state.elapsed});
        } else {
            // remove timer
            clearInterval(this.state.timer);
            // update states
            this.setState({label:"Start", running:false, timer:null, now:Date.now()-this.state.elapsed});
        }
    },
    // clear button event handling
    onClearClicked: function() {
        console.log("clear");
        // clear timer
        clearInterval(this.state.timer);
        // update states
        this.setState({label:"Start", running:false, timer:null, elapsed:0});
    },
    // render
    render: function() {
        return (
            <div>
                <label>{this.state.elapsed} ms</label>
                <button onClick={this.onStartClicked}>{this.state.label}</button><button onClick={this.onClearClicked}>Clear</button>
            </div>
        );
    }
});

// render
ReactDOM.render(
    <StopWatch />,
    document.getElementById("root")
);