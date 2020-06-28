import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';

class People extends Component {
    constructor(props) {
        super(props);
        this.state = {
            people: {}
        }
    }

    componentDidMount() {
        $('.people-detail').click(() => {
            fetch(`${$('.people-detail').data('baseurl')}`, {
                method: 'GET',
                mode: 'same-origin',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(response => {
                console.log(response)
                if (response.ok) {
                    return response.json();
                }
                throw new Error(response.statusText);
            }).then(response => {
                this.setState({
                    people: {
                        cardnumber: response.data.cardnumber,
                        firstname: response.data.firstname,
                        lastname: response.data.lastname,
                        name: response.data.name,
                        jobtitle: response.data.jobtitle,
                        year: response.data.year
                    }
                })
            })
        })
    }

    render() {
        return (
            <React.Fragment>
                <div className="modal fade" id="detailModal" tabIndex="-1" role="dialog"
                     aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div className="modal-dialog">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="detailModalLabel">People details</h5>
                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div className="modal-body d-flex flex-column justify-content-center align-items-center">
                                <div className="card-title"><h1>{this.state.people.name}</h1></div>
                                <div className="card-title"><h1>{this.state.people.firstname}{' | '}{this.state.people.lastname}</h1></div>
                                <div className="card-subtitle text-muted"><h3>{this.state.people.cardnumber}</h3></div>
                                <div className="card-subtitle text-muted"><h3>{this.state.people.jobtitle}</h3></div>
                                <div className="card-subtitle text-muted"><h3>{this.state.people.year}</h3></div>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" className="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}


export default People;
if (document.getElementById('people_detail')) {
    ReactDOM.render(<People />, document.getElementById('people_detail'));
}

