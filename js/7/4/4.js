
// create Message component
var Highscores = React.createClass({
    
    getInitialState: function() {
        return {
            highscores: [],
            loaded: false
        };
    },
    
    componentDidMount: function() {
        this.getHighscores();
    },
    
    getHighscores: function() {
        // take this to variable me -> used inside AJAX-callback functions
        var me = this;
        // create ajax call to json file, handle done and fail
        $.ajax({
            url: 'scores.json',
            cache: false,
            dataType: 'json'
        }).done(function(data) { 
            me.setState({highscores: data.highscores, loaded:true});   
        }).fail(function(jqXHR, textStatus, errorThrown) {
            me.setState({infoText: textStatus+":"+errorThrown});
        });
    },
    
    onLoadClick: function() {
        this.setState({highscores: [], loaded:false});
        this.getHighscores();
    },
    
    render: function() {
        if (!this.state.loaded) {
            return (
                <div>
                    <h3>Highscores</h3>
                    <p>Loading...</p>
                </div>
        );
    }
        
    return (
        <div>
            <h3>Highscores</h3>
            <ul>
                {this.state.highscores.map(function(hs,index){
                   return <li key={index} data-key={index}>{hs.name}:{hs.score}</li>;
                })}
            </ul>
            <button onClick={this.onLoadClick}>Load again</button>
        </div>
    );
}
    
});




ReactDOM.render(
    <Highscores />, 
    document.getElementById("root")
);

//t3 - t4 - t2 - t1 - t5(demo 12)