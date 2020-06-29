import React, {Component, useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';

class People extends Component {
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
                                <GetPeople/>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

function GetPeople(){
    const [people, setPeople] = useState({});

    useEffect(() => {
        $('.people-detail').click(async function (){
            await fetch(`${$(this).data('baseurl')}`, {
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
                console.log(response)
                setPeople({
                        name: response.data.name,
                        firstname: response.data.firstname,
                        lastname: response.data.lastname,
                        cardnumber: response.data.cardnumber,
                        jobtitle: response.data.jobtitle,
                        year: response.data.year
                });
            }).catch(error => error);
        })
    })

    return (
        <React.Fragment>
            <div className="card-title m-0"><h1 className='m-0 font-weight-bold'>{people.name}</h1></div>
            <div className="card-title m-0"><h2>{people.firstname}{' | '}{people.lastname}</h2></div>
            <div className="card-subtitle"><h3 className='text-muted'>{people.cardnumber}</h3></div>
            <div className="card-subtitle"><h3 className='text-muted'>{people.jobtitle}</h3></div>
            <div className="card-subtitle"><h3>{people.year}</h3></div>
        </React.Fragment>
    )
}

function Delete() {
    const state = {baseurl: ''};
    $('.people-confirm-delete').click(function () {
        $('.people-delete-form').attr('action', `${$(this).data('baseurl')}`)
        state.baseurl = $(this).data('baseurl');
    });

    return (
        <React.Fragment>
            <div className="modal fade" id="deleteModal" tabIndex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="deleteModalLabel">Delete Data Person</h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            Apakah kamu yakin untuk menghapus data?
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type='submit' className="btn btn-primary">Delete Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </React.Fragment>
    );
}

export default People;
if (document.getElementById('people_detail')) {
    ReactDOM.render(<People />, document.getElementById('people_detail'));
    ReactDOM.render(<Delete />, document.getElementById('people_confirm_delete'));
}

