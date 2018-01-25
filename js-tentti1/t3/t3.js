var Courses = React.createClass({
    
    getInitialState: function() {
        return {
            courses: [],
            list: [],
            loaded: false,
            option: "Yrittäjyys"
        };
    },
    
    componentDidMount: function() {
        this.getCourse();
    },
    
    getCourse: function() {
        var me = this;
        $.ajax({
            url: 'courses.json',
            cache: false,
            dataType: 'json'
        }).done(function(data) { 
            {me.setState({courses: data.courses, loaded:true});}
        }).fail(function(jqXHR, textStatus, errorThrown) {
            me.setState({infoText: textStatus+":"+errorThrown});
        });
    },
    
    handleChange: function(e) {
        this.setState({option:e.target.value});
        console.log(this.state.option);
    },
    
    add: function() {
        this.state.option = <li>{this.state.option}</li>;
        var a = this.state.list.concat(this.state.option);
        this.setState({list: a});
        console.log(this.state.list);
    },
    
    render: function() {
        var items = this.state.courses.map(function(item, index) {
            return (
                <option key={index} value={item.name}>{item.name} ({item.points})</option> 
            );
        });
        return (
            <div>
                <select id = "dropdown" onChange={this.handleChange} value={this.state.option}>
                    {items}
                </select>
                <input type="submit" value="Add" onClick={this.add} />
                <h1> Kurssiluettelo </h1>
                <ul> {this.state.list} </ul>
            </div>
        )
    }
});


ReactDOM.render(
    <Courses />, 
    document.getElementById("root")
);