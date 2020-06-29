import React, {Component, useEffect, useState} from 'react'
import ReactDOM from 'react-dom'
import $ from 'jquery'

class Student extends Component {
    render(){
        return (
            <React.Fragment>
                <div className="modal fade" id="detailModal" tabIndex="-1" role="dialog"
                     aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div className="modal-dialog">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="detailModalLabel">Student details</h5>
                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div className="modal-body d-flex flex-column justify-content-center align-items-center">
                                <GetStudent/>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        )
    }
}

function GetStudent() {
    const [student, setStudent] = useState({})

    useEffect(() => {
        $('.student-detail').click(async function () {
            await fetch(`${$(this).data('baseurl')}`, {
                method: 'GET',
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(response => {
                console.log(response)
                if (response.ok){
                    return response.json();
                }
                throw new Error(response.statusText)
            }).then(response => {
                console.log(response)
                setStudent({
                    nim: response.data.nim,
                    nama: response.data.nama,
                    jurusan: response.data.jurusan,
                    angkatan: response.data.angkatan
                })
            }).catch(error => console.error(error))
        })
    })

    return (
        <React.Fragment>
            <div className="card-title m-0"><h1 className='m-0 font-weight-bold'>{student.nim}</h1></div>
            <div className="card-title m-0"><h2>{student.nama}</h2></div>
            <div className="card-subtitle"><h3 className='text-muted'>{student.jurusan}</h3></div>
            <div className="card-subtitle"><h3 className='text-muted'>{student.angkatan}</h3></div>
        </React.Fragment>
    )
}

function Delete() {
    $('.student-confirm-delete').click(function () {
        $('.student-delete-form').attr('action', `${$(this).data('baseurl')}`);
    });

    return (
        <React.Fragment>
            <div className="modal fade" id="deleteModal" tabIndex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="deleteModalLabel">Delete Data Student</h5>
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
    )
}

export default Student;
if (document.getElementById('student_detail')) {
    ReactDOM.render(<Student/>, document.getElementById('student_detail'));
    ReactDOM.render(<Delete/>, document.getElementById('student_confirm_delete'));
}
