
// create Message component
var Talot = React.createClass({
    
    getInitialState: function() {
        return {
            talot: [],
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
            url: 'talotiedot.json',
            cache: false,
            dataType: 'json'
        }).done(function(data) { 
            me.setState({talot: data.talot, loaded:true});   
        }).fail(function(jqXHR, textStatus, errorThrown) {
            me.setState({infoText: textStatus+":"+errorThrown});
        });
    },
    
    render: function() {    
        return (
            <div id="talot">
                <h3>JSON-talot</h3>
                {this.state.talot.map(function(talo,index){
                   return <div className="taloContainer" key={index} data-key={index}>
                    <img className="taloImage" src={talo.kuva}></img>
                    <p className="otsikko">{talo.osoite}</p> 
                    <p>{talo.koko}</p>
                    <p className="kuvaus">{talo.kuvaus}</p>
                    <p>{talo.hinta}</p>
                   </div>;
                })}
            </div>
        );
}
    
});




ReactDOM.render(
    <Talot />, 
    document.getElementById("root")
);