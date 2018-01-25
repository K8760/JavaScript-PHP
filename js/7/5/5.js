// TodoBanner component
var TodoBanner = React.createClass({    
    
    // render this component
    render: function(){
        return (
            <h1>Todo Example with React</h1>
        )
    }
    
});

// TodoList component
var TodoList = React.createClass({
    
    // render this component
    render: function() {
        //console.log("render TodoList");
        console.log(this.props.items);
        var items = this.props.items.map(function(item, index) {
            return (
                <li key={index}>
			         <span>{item}</span>
                     <img className="delete" src="delete.jpg" onClick={this.props.removeItem.bind(this,index)} />
                </li> 
            );
        }.bind(this));
        return (
            <ul>{items}</ul>
        )
    }
                                 
});

// TodoForm component
var TodoForm = React.createClass({
    
    // init component state
    getInitialState: function() {
        return {item: ""};
    },
    
    // add a new item -> call parent
    handleSubmit: function(e){
        // prevent normal submit event
        e.preventDefault();
        // call parent to add a new item
        this.props.onFormSubmit(this.state.item);
        // remove new typed item from text input
        e.target.children[0].value = "";
        // focus text input
        e.target.children[0].focus();
    },
    
    // item value is changed
    onChange: function(e){
        // update item value in state
        this.setState({item: e.target.value});
    },
    
    // render component
    render: function(){
        return (
            <form onSubmit={this.handleSubmit}>
		      <input type="text" onChange={this.onChange} />
              <input type="submit" value="Add" />
            </form>
        );
    }
    
});		

// App component
var App = React.createClass({
    
    // init component state
    getInitialState: function() {
        // empty todos at start
        return {items: []};
    },
    
    // add a new item
    addItem: function(newItem) {
        // returns a new list with a new item
        var a = this.state.items.concat(newItem);
        // render again
        this.setState({items: a});
    },
    
    // remove item
    removeItem: function(index){
        // remove from items array
        var a = this.state.items;
        a.splice(index,1);
        // render again
        this.setState({items: a});
    },
    
    // render component
    render: function() {
        return (
            <div>
                <TodoBanner/>
                <TodoForm onFormSubmit={this.addItem} />
                <TodoList items={this.state.items} removeItem={this.removeItem}  />
            </div>
        )
    }
    
});

ReactDOM.render(
    <App/>,
    document.getElementById('root')
);


