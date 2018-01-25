var highscoreData = [
  { id: 1, name: 'Jason', score: 4000 },
  { id: 2, name: 'Make', score: 3000 },
  { id: 3, name: 'Bill', score: 2000 },
  { id: 4, name: 'Liza', score: 1000 }
];   


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
        setTimeout(function() {
            this.setState({highscores: highscoreData, loaded:true});
        }.bind(this), 3000);
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