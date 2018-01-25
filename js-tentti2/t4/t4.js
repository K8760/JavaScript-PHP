var TodoList = React.createClass({
    
    // render this component
    render: function() {
        //console.log("render TodoList");
        console.log(this.props.items);
        var items = this.props.items.map(function(item, index) {
            return (
                <li key={index}>
			         {item}
                </li> 
            );
        }.bind(this));
        return (
            <ul>{items}</ul>
        )
    }
                                 
});

var TodoForm = React.createClass({
    getInitialState: function() {
        return {
            name: "", 
            link:"", 
            option: "CrazyStuff",
            item: ""
        };
    },
    
    handleChange: function(e) {
        this.setState({[e.target.name]: e.target.value});
    },
    
    handleChange1: function(e) {
        this.setState({option:e.target.value});
    },
    
    handleSubmit: function(e){
        e.preventDefault();
        this.state.item = this.state.name + this.state.link + this.state.option + this.state.data;
        this.setState({item: this.state.item});
        console.log("hadle:" + this.state.item);
        this.props.onFormSubmit(this.state.item);
        e.target.children[0].value = "";
        e.target.children[1].value = "";
        e.target.children[0].focus();
    },
    
    componentDidMount() {
        setInterval( () => {
          this.setState({
            data : new Date().toLocaleString()
          })
        },1000)
    },
    
    render: function() {

        return (
            <form onSubmit={this.handleSubmit}>
                <input type="text" value={this.state.name} name="name" onChange={this.handleChange} />
                <input type="text" value={this.state.link} name="link" onChange={this.handleChange} />
                <select id = "dropdown" onChange={this.handleChange1} value={this.state.option}>
                    <option value="GrazyStuff">GrazyStuff</option>
                    <option value="CoolStuff">CoolStuff</option>
                    <option value="HotStuff">HotStuff</option>
                </select>
                <input type="submit" value="Add" />
            </form>
        );
    }
});

var App = React.createClass({
    getInitialState: function() {
        return {items: []};
    },
    
    addItem: function(newItem) {
        var a = this.state.items.concat(newItem);
        this.setState({items: a});
    },
    
    
    // render component
    render: function() {
        return (
            <div>
                <TodoForm onFormSubmit={this.addItem} />
                <TodoList items={this.state.items}  />
            </div>
        )
    }
    
});

ReactDOM.render(<App />, document.getElementById('root')); 
